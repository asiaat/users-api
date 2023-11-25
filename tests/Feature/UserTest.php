<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    public function test_user_can_retrieve_their_information()
    {
        $user = User::factory()->create();
        $this->assertNotEmpty($user);
        echo "\Generated  user: " . $user->lastname . "\n";

        $token = $user->createToken('TestToken')->plainTextToken;
        $this->assertNotEmpty($token);
        echo "\nGenerated token: " . $token . "\n";
 
        $response = $this->withHeaders([
             'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/user');
        echo "\nContent of response: " . $response->content() . "\n";
 
        $response->assertStatus(200);
    }
}
