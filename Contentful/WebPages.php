<?php

namespace App\Contentful;

use App\Contentful\Concerns\RendersRichText;
use TightenCo\Jigsaw\Jigsaw;
use cebe\markdown\GithubMarkdown;

/**
 * Class WebPages
 * @namespace App\Contentful
 * @package App\Contentful\WebPages
 * @property string $seo
 * @property GithubMarkdown $parser
 * @property string $pageTemplateName
 * @property array  $pageTemplateBlocks
 */
class WebPages
{
  use RendersRichText;

  protected $seo;
  protected $parser;
  protected $pageTemplateName;
  protected $pageTemplateSlug;
  protected $pageTemplateBlocks;

  /**
   * Constructor
   */
  public function __construct($item)
  {
    $this->seo = $this->getSEO($item->seo);
    $this->parser = new GithubMarkdown();
    $this->pageTemplateName = $item->pageTemplateName;
    $this->pageTemplateSlug = $item->pageTemplateSlug;
    $this->pageTemplateBlocks = $this->getPageTemplateBlocks($item->pageTemplateBlocks);
  }

  /**
   * Get the SEO data for the page.
   * @param  object $seo
   */
  private function getSEO($seo)
  {
    return [
      'title' => $seo->title,
      'description' => $seo->description,
      'image' => $seo->image,
      'canonical' => ($seo->slug
        ? getenv('BASE_URL') . '/' .
        ($seo->slug === 'index' ? '' : $seo->slug . '/')
        : ''),
      'robots' => $seo->robots,
    ];
  }

  /**
   * Get the blocks for the page template.
   *
   * @param  array $pageTemplateBlocks
   * @param  array $blocks
   * @return array
   */
  private function getPageTemplateBlocks($pageTemplateBlocks, array $blocks = []): array
  {
    foreach ($pageTemplateBlocks as $block) {
      $body = ($block->body instanceof \Contentful\RichText\Node\Document
        ? $this->renderRichTextNodes($block->body)
        : $this->parser->parse($block->body));

      $blockMap = [
        'blockType' => $block->getContentType()->getId(),
        'title' =>  $block->title,
        'body' => ($body ? $body : ''),
        'image' => ($block->image ?? ''),
        'background' => ($block->background ?? ''),
        'embeddedMedia' => ($block->embeddedMedia ?? ''),
        'blocks' => (!empty($block->blocks) && $block->blocks ? $this->getPageTemplateFieldBlocks($block->blocks) : []),
      ];

      array_push($blocks, $blockMap);
    }

    return $blocks;
  }

  /**
   * Get the blocks for the page template.
   * @param  array $blocks
   * @return array
   */
  public function getPageTemplateFieldBlocks($blocks, $fieldBlocks = [], $body = ''): array
  {
    foreach ($blocks as $block) {
      if ($block->references) {
        foreach ($block->references as $reference) {
          if (isset($reference->body)) {
            $body = ($reference->body instanceof \Contentful\RichText\Node\Document
              ? $this->renderRichTextNodes($reference->body)
              : $this->parser->parse($reference->body));
          }

          $fieldBlockMap = [
            'blockType' => $reference->getContentType()->getId(),
            'title' => $reference->title,
            'body' => ($body ? $body : ''),
          ];

          $fieldBlockMap = $this->mapByContentType($reference->getContentType()->getId(), $reference, $fieldBlockMap);

          array_push($fieldBlocks, $fieldBlockMap);
        }
      }
    }

    return $fieldBlocks;
  }

  public function mapByContentType($contentType, $reference, $fieldBlockMap)
  {
    $fieldBlockMap = collect($fieldBlockMap);
    $fieldBlockMap->map(function () use ($fieldBlockMap, $reference, $contentType) {
      switch ($contentType) {
        case 'cardGrid':
          if ($reference->collectionType == 'project') {
            $fieldBlockMap->put('collection', $this->jigsaw->getCollection('projects'));
          }

          $fieldBlockMap->put('collectionType', strtolower($reference->collectionType));
          $fieldBlockMap->put('featured', $reference->featured);
          break;
        case 'callToActionComponent':
          // dump($reference->actions);
          $fieldBlockMap->put('actions', $reference->actions);
          break;
        case 'content':
          $fieldBlockMap->put('image', $reference->image);
          $fieldBlockMap->put('embeddedMedia', $reference->embeddedMedia);
          break;
        case 'projects':
          $fieldBlockMap->put('slug', $reference->slug);
          $fieldBlockMap->put('image', $reference->image);
          $fieldBlockMap->put('cover', $reference->cover);
          $fieldBlockMap->put('coverWidth', $reference->coverWidth);
          $fieldBlockMap->put('projectUrl', ($reference->URL ?? ''));
          $fieldBlockMap->put('builtWith', $reference->builtWith);
          $fieldBlockMap->put('brand', $reference->slug);
          $fieldBlockMap->put('brandColor', $reference->brand);
          $fieldBlockMap->put('featured', ($reference->featured ?? false));
          $fieldBlockMap->put('launched', $reference->launched);
          break;
        case 'skill':
          $fieldBlockMap->put('skill', $reference->skills);
          break;
      }

      return $fieldBlockMap;
    });

    return $fieldBlockMap->all();
  }

  public function toArray()
  {
    return [
      'seo' => $this->seo,
      'pageTemplateName' => $this->pageTemplateName,
      'pageTemplateSlug' => $this->pageTemplateSlug,
      'pageTemplateBlocks' => $this->pageTemplateBlocks
    ];
  }
}
