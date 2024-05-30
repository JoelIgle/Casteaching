<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function create_default_user()
    {
        create_default_user();
        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'name' => config('casteaching.user_profe.name'),
        ]);
        $this->assertDatabaseHas('users', [
            'email' => config('casteaching.user_profe.email'),
        ]);
        $this->assertTrue(Hash::check('casteaching..user_profe.password', config('casteaching.user_profe.password')));

    }

    /**
     * @test
     */
    public function create_default_videos(){
        create_default_videos();
        $this->assertDatabaseCount('videos', 1);
    }
}

//
//create_default_user();
//
//create_default_videos();
