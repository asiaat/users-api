<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function redirect()
    {
        $redirectUrl = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
        return response()->json(['url' => $redirectUrl]);
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();        

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'password' => bcrypt('password123'),
                'firstname' => $googleUser->getName(), 
                'lastname' => $googleUser->getName(), 
            ]
        );
    
        $token = $user->createToken('authToken')->plainTextToken;

        Auth::login($user);
           
        return redirect()->to('http://localhost:3000/callback?token=' . $token );

    } 


}
