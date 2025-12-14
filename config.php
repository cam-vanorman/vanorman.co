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

    // Contentful
    'contentful_env_id' => getenv('CONTENTFUL_ENV_ID'),
    'contentful_space_id' => getenv('CONTENTFUL_SPACE_ID'),
    'contentful_access_token' => getenv('CONTENTFUL_ACCESS_TOKEN'),

    'contentful_collection' => function ($config) {
        return (new ContentfulCollection(
            $config->get('contentful_access_token'),
            $config->get('contentful_space_id'),
            $config->get('contentful_env_id')
        ));
    },

    // collections
    'collections' => [
        'pages' => [
            'content_model' => 'webPage',
            'path' => '{pageTemplateSlug}',
            'extends' => '_layouts.pages',
            'items' => function ($config) {
                return $config->get('contentful_collection')->getWebPages();
            },
        ],
        'projects' => [
            'content_model' => 'project',
            'sort' => ['-featured', '-launched'],
            'path' => 'project/{slug}',
            'extends' => '_layouts.project',
            'items' => function ($config) {
                return (new ContentfulCollection(
                    $config->get('contentful_access_token'),
                    $config->get('contentful_space_id'),
                    $config->get('contentful_env_id')
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
        'calltoActionComponent' => [
            'content_model' => 'calltoActionComponent',
            'sort' => 'title',
        ],
        'cardGrid' => [
            'content_model' => 'cardGrid',
            'sort' => 'title',
        ],
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
