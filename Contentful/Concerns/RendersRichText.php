<?php

namespace App\Contentful\Concerns;

use Contentful\RichText\Renderer;

trait RendersRichText
{
    public function renderRichTextNodes($nodes)
    {
        if (!$nodes) {
            return '';
        }

        $renderer = new Renderer();

        if (!is_string($nodes)) {
            return collect($nodes->getContent())
                ->reduce(function ($carry, $node) use ($renderer) {
                    return $carry . $renderer->render($node);
                }, '');
        } else {
            return $nodes;
        }
    }
}
