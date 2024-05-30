<?php

namespace App\Events;

use App\Models\Video;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VideoCreatedEvent
{
    use Dispatchable, SerializesModels;

    public $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }
}
