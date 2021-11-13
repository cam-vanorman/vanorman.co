<?php

namespace App\Contentful;

use App\Contentful\WebPages;
use App\Contentful\Page;
use App\Contentful\Projects;
use Contentful\Delivery\Query;
use Contentful\Delivery\Client;

class ContentfulCollection
{
    public $client;

    public function __construct($apiKey, $spaceId)
    {
        $this->client = new Client(
            $apiKey,
            $spaceId
        );
    }

    public function getWebPages()
    {
        $query = (new Query)->setContentType('webPages');

        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return (new WebPages($item))->toArray();
            });
    }

    public function getPages()
    {
        $query = (new Query)->setContentType('page')
            ->orderBy('-sys.createdAt');

        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return (new Page($item))->toArray();
            });
    }

    public function getProjects()
    {
        $query = (new Query)->setContentType('projects')
            ->orderBy('-fields.featured')
            ->orderBy('-fields.launched');

        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return (new Projects($item))->toArray();
            });
    }
}
