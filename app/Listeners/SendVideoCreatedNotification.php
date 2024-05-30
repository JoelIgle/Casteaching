<?php

namespace App\Listeners;

use App\Events\VideoCreatedEvent;
use App\Models\User;
use App\Notifications\VideoCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVideoCreatedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(VideoCreatedEvent $event)
    {
        $user = User::first();



        if ($user) {

            $user->notify(new VideoCreated($event->video));
        } else {
            echo "No se encontró ningún usuario en la base de datos.";
        }
    }
}
