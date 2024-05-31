<?php

namespace Tests\Unit;

use App\Models\Serie;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SerieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function serie_have_videos(): void
    {
        $serie = Serie::create([
            'title' => 'Serie 1',
            'description' => 'Aquesta serie es de la bd',
            'image' => '/tdd.png',
            'teacher_name' => 'Teacher',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@iesebre.com'),
            'created_at' => Carbon::now()->addSeconds(1),

        ]);

        $this->assertNotNull($serie->videos);
        $this->assertCount(0, $serie->videos);

        $video = Video::create([
            'title' => 'Video 1',
            'description' => 'Aquesta serie es de la bd',
            'url' => 'https://www.youtube.com/watch?v=1234',
            'serie_id' => $serie->id,
        ]);

        $serie->refresh();

        $this->assertNotNull($serie->videos);
        $this->assertCount(1, $serie->videos);

    }
}
