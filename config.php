<?php

return [
    'baseUrl' => 'http://localhost:3000/',
    'production' => false,
    'siteName' => 'Cameron Van Orman',
    'siteDescription' => 'Web Developer',
    'siteAuthor' => 'Cameron Van Orman',

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
