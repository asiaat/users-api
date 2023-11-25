<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@probe.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'firstname' => 'First',
            'lastname'=> 'Last',
        ]);

        $this->assertAuthenticated();
        $response->assertNoContent();
    }
}
