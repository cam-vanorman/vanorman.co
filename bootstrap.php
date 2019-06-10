<?php

use App\Listeners\ContentfulFetcher;
use Symfony\Component\Dotenv\Dotenv;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

if (file_exists(__DIR__.'/.env')) {
    // Load env vars from .env if that file exists
    $dotenv = new Dotenv();
    $dotenv->load(__DIR__ . '/.env');
}

/*
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

$events->beforeBuild(ContentfulFetcher::class);
$events->afterBuild(App\Listeners\GenerateSitemap::class);
$events->afterBuild(App\Listeners\GenerateIndex::class);
