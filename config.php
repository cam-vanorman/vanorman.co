<?php

return [
    'baseUrl' => getenv('BASE_URL'),
    'production' => false,
    'siteName' => getenv('SITE_NAME'),
    'siteDescription' => getenv('SITE_DESCRIPTION'),
    'siteAuthor' => getenv('SITE_AUTHOR'),

    // collections
    'collections' => [
        'projects' => [
            'content_model' => 'projects',
            'sort' => '-publishDate',
            'path' => 'project/{filename}',
        ],
        'pages' => [
            'content_model' => 'page',
            'sort' => '-publishDate',
            'path' => '{filename}',
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
        return explode(', ', $page->tag);
    },

    // helpers
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
];
