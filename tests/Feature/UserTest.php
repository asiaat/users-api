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
         // Kasutaja loomine
         $user = User::factory()->create();
         // Kontrolli, kas token on olemas ja prindi see välja
        $this->assertNotEmpty($user);
        echo "\Generated  user: " . $user->lastname . "\n";

         // Sanctum tokeni genereerimine
         $token = $user->createToken('TestToken')->plainTextToken;
         // Kontrolli, kas token on olemas ja prindi see välja
        $this->assertNotEmpty($token);
        echo "\nGGenerated token: " . $token . "\n";
 
         // API päring koos tokeniga
         $response = $this->withHeaders([
             'Authorization' => 'Bearer ' . $token,
         ])->getJson('/api/user');
            
         echo "\nContent of response: " . $response->content() . "\n";
 
         // Testi vastuse kontrollimine
         $response->assertStatus(200);
    }
}
