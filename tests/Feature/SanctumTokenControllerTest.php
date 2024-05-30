<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\SanctumTokenController
 */
class SanctumTokenControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function email_is_required_for_issuing_tokens(){
        $response = $this->postJson('/api/sanctum/token', [
            'password' => '12345678',
            'device_name' => 'device name',
        ]);

        $response->assertStatus(422);
        $jsonResponse = json_decode($response->content());
        $this->assertEquals("The given data was invalid.", $jsonResponse->message);
        $this->assertEquals("The given data was invalid.", $jsonResponse->errors->email[0]);

    }

    /**
     * @test
     */
    public function invalid_email_gives_incorrect_credentials_error()
    {

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'ojid@gmail.com',
            'password' => '12345678',
        ]);

        $response = $this->post('/sanctum/token', [
            'email' => 'another_email',
            'password' => $user->password,
            'device_name' => $user->name . "'s device",
        ]);

        $response->assertStatus(422);


    }

    /**
     * @test
     */
    public function user_with_valid_credentials_can_issue_a_token(): void
    {

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'ojid@gmail.com',
            'password' => '12345678',
        ]);

        $this->assertCount(0 , $user->tokens);

        $response = $this->post('/sanctum/token', [
            'email' => $user->email,
            'password' => $user->password,
            'device_name' => $user->name . "'s device",
        ]);

        $response->assertStatus(200);
        $this->assertNotNull($response->content());
        $this->assertCount(1 , $user->fresh()->tokens);
    }
}
