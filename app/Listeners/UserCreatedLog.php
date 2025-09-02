<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UserCreatedLog
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        try {
            Log::info('UserCreated event triggered for Post ID: ' . $event->data['title']);
        } catch (\Exception $e) {
            Log::error('Error logging UserCreated event: ' . $e->getMessage());
        }
    }
}
