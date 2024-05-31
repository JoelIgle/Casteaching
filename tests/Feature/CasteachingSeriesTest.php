<?php

namespace Tests\Feature;

use App\Models\Serie;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Tests\TestCase;

class CasteachingSeriesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function guest_users_can_see_published_series(): void
    {

        $serie = Serie::create([
            'title' => 'Serie 1',
            'description' => 'Aquesta serie es de la bd',
            'image' => '/tdd.png',
            'teacher_name' => 'Teacher',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@iesebre.com'),
            'created_at' => Carbon::now()->addSeconds(1),

        ]);

        $serie2 = Serie::create([
            'title' => 'Serie 2',
            'description' => 'Aquesta serie es de la bd',
            'image' => '/tdd.png',
            'teacher_name' => 'Teacher',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@iesebre.com'),
            'created_at' => Carbon::now()->addSeconds(2),

        ]);
        $view = $this->blade('<x-casteaching-series/>',);

        $view->assertSeeInOrder([$serie->title, $serie2->title]);
    }
}
