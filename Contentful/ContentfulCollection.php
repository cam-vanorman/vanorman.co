<?php

namespace App\Contentful;

use App\Contentful\WebPages;
use App\Contentful\Page;
use App\Contentful\Projects;
use Contentful\Delivery\Query;
use Contentful\Delivery\Client;

/**
 * Class Contentful Collection
 *
 * @package App\Contentful
 *
 */
class ContentfulCollection
{
    public $client;

    /**
     * ContentfulCollection constructor.
     *
     * @param $token
     * @param $spaceId
     */
    public function __construct($token, $spaceId, $envId, $options = null)
    {
        $this->client = new Client(
            $token,
            $spaceId,
            $envId,
            $options
        );
    }

    /**
     * Get all web pages
     */
    public function getWebPages()
    {
        $query = (new Query)->setContentType('webPages');

        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return (new WebPages($item))->toArray();
            });
    }

    /**
     * Get all page content
     *
     * orderBy: -sys.createdAt
     */
    public function getPages()
    {
        $query = (new Query)->setContentType('page')
            ->orderBy('-sys.createdAt');

        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return (new Page($item))->toArray();
            });
    }

    /**
     * Get all projects
     *
     * orderBy: -fields.featured
     * orderBy: -fields.launched
     */
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
