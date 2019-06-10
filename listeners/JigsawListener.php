<?php
    namespace App\Listeners;
    use TightenCo\Jigsaw\Jigsaw;
    interface JigsawListener
    {
        public function handle(Jigsaw $jigsaw): void;
    }