<?php

namespace App\Console\Commands;

use App\Models\Video;
use App\Notifications\VideoCreated;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TestSendVideoCreatedEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:videocreatednotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $video = create_sample_video();
        $user = Auth::user();
        $user->notify(new VideoCreated($video));
    }
}
