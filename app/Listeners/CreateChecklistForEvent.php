<?php

namespace App\Listeners;

use App\Checklist;
use App\Events\EventCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateChecklistForEvent implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventCreated $event)
    {
        Checklist::create([
            'evento_id' =>  $event->evento->id,
        ]);
    }
}
