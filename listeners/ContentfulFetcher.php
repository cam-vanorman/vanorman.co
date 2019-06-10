<?php

namespace App\Listeners;

use Contentful\Delivery\Client;
use Contentful\Delivery\Resource\Entry;
use TightenCo\Jigsaw\Jigsaw;

class ContentfulFetcher implements JigsawListener
{
    public function handle(Jigsaw $jigsaw): void
    {
        // only fetch new content during production builds
        if ($jigsaw->getEnvironment() === 'local') {
            return;
        }

        $client = $this->getClient($jigsaw);

        foreach ($jigsaw->getCollections() as $collection) {
            $collectionConfig = $jigsaw->getConfig("collections.$collection");

            $this->cleanSourceDir($jigsaw, $collection);
            $entries = $this->getPlainEntries($client, $collectionConfig['content_model']);

            foreach ($entries as $entry) {
                $this->writeEntryToMarkdownFile($jigsaw, $entry, $collection);
            }
        }
    }

    private function getClient(Jigsaw $jigsaw): Client
    {
        return new Client(
            $jigsaw->getConfig('contentful.access_token'),
            $jigsaw->getConfig('contentful.space_id')
        );
    }

    /**
     * Before every run, we remove the previous contents of the source directory.
     *
     * @param Jigsaw $jigsaw
     * @param string $collection
     */
    private function cleanSourceDir(Jigsaw $jigsaw, string $collection): void
    {
        $dir = $jigsaw->getSourcePath() . '/_' . $collection;
        $jigsaw->getFilesystem()->deleteDirectory($dir, true);
    }

    /**
     * We transform objects of type \Contentful\Delivery\Resource\Entry
     * into plain arrays for ease of use later on.
     *
     * @param Client $client
     * @param string $contentTypeId
     * @param string|null $sortField
     * @param string|null $sortOrder
     * @return array
     */
    private function getPlainEntries(
        Client $client,
        string $contentTypeId,
        string $sortField = null,
        string $sortOrder = null
    ): array {
        $query = (new \Contentful\Delivery\Query())
            ->setContentType($contentTypeId);

        if ($sortField) {
            $query->orderBy($sortField, $sortOrder === 'DESC');
        }

        $entries = $client->getEntries($query);

        if (!count($entries)) {
            return [];
        }

        return collect($entries->getItems())->map(function (Entry $entry) {
            return collect($entry->all())->map(function ($value) {
                // resolve image url for asset images
                if ($value instanceof \Contentful\Delivery\Resource\Asset) {
                    $file = $value->getFile();
                    if ($file instanceof \Contentful\Core\File\ImageFile) {
                        return $file->getUrl();
                    }

                    return '';
                }

                if ($value instanceof Entry) {
                    return $value->get($value->getContentType()->getDisplayField()->getName());
                }

                return $value;
            })->all();
        })->all();
    }

    /**
     * Converts an entry into a markdown file and writes it to disk.
     *
     * @param Jigsaw $jigsaw
     * @param array $entry
     * @param string $collection
     */
    private function writeEntryToMarkdownFile(Jigsaw $jigsaw, array $entry, string $collection): void
    {
        $contents = "---\n";
        $contents .= "extends: _layouts.$collection\n";
        $contents .= "section: content\n";

        foreach ($entry as $field => $value) {
            if (is_array($value)) {
                $value = implode(', ', $value);
            }

            // The "body" field is added as the content of the file
            if ($field === 'body') {
                continue;
            }

            $contents .= "$field: $value\n";
        }

        $contents .= "---\n\n";
        $contents .= $entry['body'];

        $jigsaw->writeSourceFile("_$collection/{$entry['slug']}.md", $contents);
    }
}