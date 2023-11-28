<?php

namespace Tests\Feature;


use Tests\TestCase;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Illuminate\Foundation\Testing\RefreshDatabase; 
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\CreatesApplication;

class GoogleAuthTest extends TestCase
{
    //use CreatesApplication;
    use RefreshDatabase;
    //use WithoutMiddleware;

    public function testGoogleRedirect()
    {
        //$this->startSession(); 
        $response = $this->get('api/auth/google/redirect');
        $response->assertStatus(302); 
        $response->assertRedirect(); 
    }

    
    public function testGoogleCallback()
    {
        $abstractUser = new SocialiteUser();
        $abstractUser->id = '12345';
        $abstractUser->name = 'Test User';
        $abstractUser->email = 'test@example.com';
        $abstractUser->avatar = 'http://example.com/avatar.jpg';

        Socialite::shouldReceive('driver')
            ->with('google')
            ->andReturnSelf()
            ->shouldReceive('user')
            ->andReturn($abstractUser);

        $response = $this->get('api/auth/google/callback');
        $response->assertStatus(200); 
    }
    
}
