<?php

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
        '404'      => getenv('SITE_404'),
    ],

    // collections
    'collections' => [
        'pages' => [
            'content_model' => 'page',
            'sort' => '-publishDate',
            'path' => '{filename}',
        ],
        'projects' => [
            'content_model' => 'projects',
            'sort' => ['-featured', '-launched'],
            'path' => 'project/{filename}',
            'extends' => '_layouts.project',
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
