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
        $user = User::factory()->create([
            //'name' => 'Original Name',
            'email' => 'original@example.com',
            'password' => bcrypt('password'),
            'firstname' => 'Original',
            'lastname' => 'Name',
            'dateofbirth'=> '1969-10-15',
        ]);

        $this->actingAs($user);

        $response = $this->put('/update', [
            //'name' => 'Updated Name',
            'firstname' => 'Updated',
            'lastname' => 'User',
            'dateofbirth'=> '1969-10-16',
        ]);

        $response->assertOk();

        $user->refresh();

        //$this->assertEquals('Updated Name', $user->name);
        $this->assertEquals('Updated', $user->firstname);
        $this->assertEquals('User', $user->lastname);
        $this->assertEquals('1969-10-16', $user->dateofbirth);
    }
}
