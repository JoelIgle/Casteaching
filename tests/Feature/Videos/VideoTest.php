<?php

namespace Tests\Feature\Videos;

use App\Models\Serie;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function users_can_view_videos()
    {

        $video = Video::create([
            'title' => 'Video Example',
            'description' => 'Video Description',
            'url' => 'https://www.youtube.com/watch?v=12345',
            'published_at' => Carbon::parse('December 1, 2020 8:00am'),
            'previous' => null,
            'next' => null,
            'serie_id' => 1,

        ]);
        $response = $this->get('/videos/' . $video->id);

        $response->assertStatus(200);
        $response->assertSee('Video Example');
        $response->assertSee('Video Description');
        $response->assertSee('1 de December de 2020');

    }

    /**
     * @test
     */
    public function video_have_serie() {

        $video = Video::create([
            'title' => 'Video Example',
            'description' => 'Video Description',
            'url' => 'https://www.youtube.com/watch?v=12345',
        ]);

        $this->assertNull($video->serie);

        $serie = Serie::create([
            'title' => 'Serie test',
            'description' => 'Serie Description',
            'image' => '/tdd.png',
            'teacher_name' => 'Teacher',
        ]);


        $video->setSerie($serie);

        $this->assertNotNull($video->fresh()->serie);
    }
}
