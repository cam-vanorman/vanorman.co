<?php

namespace App\Contentful;

use App\Contentful\Concerns\RendersRichText;
use \Illuminate\Support\Collection;
use cebe\markdown\GithubMarkdown;

/**
 * Class WebPages
 *
 * @package App\Contentful
 *
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
     * @param  Collection $blocks
     * @return Collection
     */
    private function getPageTemplateBlocks($pageTemplateBlocks, $blocks = null)
    {
        if (!is_null($blocks)) {
            $blocks = collect();
        }

        return collect($pageTemplateBlocks)->map(function ($block) use ($blocks) {

            $body = ($block->body instanceof \Contentful\RichText\Node\Document
                ? $this->renderRichTextNodes($block->body)
                : $this->parser->parse($block->body));

            $fieldBlocks = (!empty($block->blocks) && $block->blocks ? collect($block->blocks) : []);
            // dump(collect($fieldBlocks));

            return [
                'blockType' => $block->getContentType()->getId(),
                'title' =>  $block->title,
                'body' => ($body ?? ''),
                'image' => ($block->image ?? ''),
                'background' => ($block->background ?? ''),
                'embeddedMedia' => ($block->embeddedMedia ?? ''),
                'blocks' => (!empty($fieldBlocks)
                    ? $this->getPageTemplateFieldBlocks($fieldBlocks)
                    : []),
            ];
        });
    }

    /**
     * Get the blocks for the page template.
     * @param  Collection $blocks
     * @return Collection
     */
    public function getPageTemplateFieldBlocks($blocks)
    {
        if (!$blocks) {
            $blocks = collect();
        }

        return $blocks->map(function ($block) {
            if ($block->references) {
                collect($block->references)->map(function ($reference) {

                    if (isset($reference->body)) {
                        $body = ($reference->body instanceof \Contentful\RichText\Node\Document
                            ? $this->renderRichTextNodes($reference->body)
                            : $this->parser->parse($reference->body));
                    }

                    $fieldBlockMap = [
                        'blockType' => $reference->getContentType()->getId(),
                        'title' => $reference->title,
                        'body' => ($body ?? ''),
                    ];

                    $fieldBlockMap = $this->mapByContentType($reference->getContentType()->getId(), $reference, $fieldBlockMap);
                });
            }

            return $block;
        });
    }

    /**
     * Map the fields by content type.
     * @param  string $contentType
     * @param  object $reference
     * @param  array $fieldBlockMap
     * @return array
     */
    public function mapByContentType($contentType, $reference, $fieldBlockMap)
    {
        $fieldBlockMap = collect($fieldBlockMap);
        $fieldBlockMap->map(function () use ($fieldBlockMap, $reference, $contentType) {
            switch ($contentType) {
                case 'cardGrid':
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
