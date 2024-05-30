<?php

namespace Tests\Unit;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_get_formated_date(): void
    {
        $video = Video::create([
            'title' => 'Video test',
            'description' => 'descr',
            'url' => 'https://www.youtube.com/watch?v=1',
            'published_at' => null,
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ]);

        $dateToTest = $video->formatted_published_at;

        $this->assertEquals($dateToTest, '');
    }
}
