<?php

namespace App\Contentful;

class Page
{
    protected $title;
    protected $slug;
    protected $body;
    protected $image;
    protected $embedded_media;

    public function __construct($item)
    {
        $this->title = $item->title ?? null;
        $this->slug = $item->slug ?? null;
        $this->body = $item->body ?? null;
        $this->image = $item->image ?? null;

        $this->embedded_media = $item->embeddedMedia ?? null;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'image' => $this->image,
            'embedded_media' => $this->embedded_media,
        ];
    }
}
