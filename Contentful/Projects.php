<?php

namespace App\Contentful;

/**
 * Class Projects
 * @package App\Contentful
 *
 * @property string $meta_description
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $cover
 * @property string $cover_width
 * @property string $image
 * @property string $url
 * @property array  $built_with
 * @property string $brand
 * @property bool $featured
 * @property string $launched
 *
 */
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
        $this->coverWidth = $item->coverWidth ?? null;
        $this->image = $item->image ?? null;
        $this->url = $item->url ?? null;
        $this->builtWith = implode(', ', $item->builtWith) ?? null;
        $this->brand = '#' . $item->brand ?? null;
        $this->featured = $item->featured ?? false;
        $this->launched = $item->launched ?? null;

        $this->metaDescription = $item->metaDescription;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'cover' => $this->cover,
            'coverWidth' => $this->coverWidth,
            'image' => $this->image,
            'url' => $this->url,
            'builtWith' => $this->builtWith,
            'brand' =>  $this->brand,
            'featured' => $this->featured,
            'launched' => $this->launched,
            'metaDescription' => $this->metaDescription,
        ];
    }
}
