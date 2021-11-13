<?php

namespace App\Contentful;

class Projects
{
    protected $meta_description;
    protected $title;
    protected $slug;
    protected $body;
    protected $cover;
    protected $cover_width;
    protected $image;
    protected $url;
    protected $built_with;
    protected $brand;
    protected $featured;
    protected $launched;

    public function __construct($item)
    {
        $this->title = $item->title;
        $this->slug = $item->slug;
        $this->body = $item->body ?? null;
        $this->cover = $item->cover ?? null;
        $this->cover_width = $item->coverWidth ?? null;
        $this->image = $item->image ?? null;
        $this->url = $item->url ?? null;
        $this->built_with = implode(', ', $item->builtWith) ?? null;
        $this->brand = '#' . $item->brand ?? null;
        $this->featured = $item->featured ?? false;
        $this->launched = $item->launched ?? null;

        $this->meta_description = $item->metaDescription;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->body,
            'cover' => $this->cover,
            'cover_width' => $this->cover_width,
            'image' => $this->image,
            'url' => $this->url,
            'built_with' => $this->built_with,
            'brand' =>  $this->brand,
            'featured' => $this->featured,
            'launched' => $this->launched,
            'meta_description' => $this->meta_description,
        ];
    }
}
