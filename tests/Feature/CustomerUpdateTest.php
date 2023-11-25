<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CustomerUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_their_information(): void
    {
        // Loome uue kasutaja
        $user = User::factory()->create([
            'name' => 'Original Name',
            'email' => 'original@example.com',
            'password' => bcrypt('password'),
            'firstname' => 'Original',
            'lastname' => 'Name',
            'dateofbirth'=> '1969-10-15',
        ]);

        // Simuleerime kasutaja sisselogimist
        $this->actingAs($user);

        // Saadame päringu kasutaja andmete uuendamiseks
        $response = $this->put('/update', [
            'name' => 'Updated Name',
            'firstname' => 'Updated',
            'lastname' => 'User',
            'dateofbirth'=> '1969-10-16',
            // Lisage siia teised vajalikud väljad
        ]);

        // Kontrollime, kas päring õnnestus
        $response->assertOk();

        // Värskendame kasutaja andmeid andmebaasis
        $user->refresh();

        // Kontrollime, kas andmed on uuendatud
        $this->assertEquals('Updated Name', $user->name);
        $this->assertEquals('Updated', $user->firstname);
        $this->assertEquals('User', $user->lastname);
        $this->assertEquals('1969-10-16', $user->dateofbirth);
        // Kontrollige siin teisi uuendatud välju
    }
}
