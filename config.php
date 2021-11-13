<?php

use App\Contentful\ContentfulCollection;

return [
    'baseUrl' => getenv('BASE_URL'),
    'production' => false,
    'site' => [
        'name' => getenv('SITE_NAME'),
        'description' => getenv('SITE_DESCRIPTION'),
        'author' => getenv('SITE_AUTHOR'),
        'logo' => getenv('SITE_LOGO'),
        'role' => getenv('SITE_ROLE'),
        'location' => getenv('SITE_LOCATION'),
        '404' => getenv('SITE_404'),
    ],

    // collections
    'collections' => [
        'pages' => [
            'path' => '{pageTemplateSlug}',
            'extends' => '_layouts.pages',
            'items' => function ($config) {
                return (new ContentfulCollection(
                    getenv('CONTENTFUL_ACCESS_TOKEN'),
                    getenv('CONTENTFUL_SPACE_ID')
                ))->getWebPages();
            },
        ],
        'projects' => [
            'sort' => ['-featured', '-launched'],
            'path' => 'project/{slug}',
            'extends' => '_layouts.project',
            'items' => function ($config) {
                return (new ContentfulCollection(
                    getenv('CONTENTFUL_ACCESS_TOKEN'),
                    getenv('CONTENTFUL_SPACE_ID')
                ))->getProjects();
            },
        ],
        'content' => [
            'content_model' => 'content',
        ],
        'skill' => [
            'content_model' => 'skill',
            'sort' => 'title',
        ],
        'socialNetworks' => [
            'content_model' => 'socialNetworks',
            'sort' => 'title',
        ],
    ],

    'contentful' => [
        'space_id' => getenv('CONTENTFUL_SPACE_ID'),
        'access_token' => getenv('CONTENTFUL_ACCESS_TOKEN'),
    ],

    /*
     * Helper methods
     */
    'tags' => function ($page) {
        return explode(', ', $page->builtWith);
    },

    'skills' => function ($page) {
        return explode(', ', $page->skills);
    },

    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
];
