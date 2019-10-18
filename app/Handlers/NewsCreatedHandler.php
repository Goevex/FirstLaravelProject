<?php

namespace App\Handlers;

use App\Events\NewsCreatedEvent;

class NewsCreatedHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //...
    }

    /**
     * Handle the event.
     *
     * @param  NewsCreatedEvent  $event
     * @return void
     */
    public function handle(NewsCreatedEvent $event)
    {
        /* Something that should happen, when new news are created. For example:*/
        echo "News created \n";
    }
}
