<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
                'password' => bcrypt('password123'), // Soovitatav on parooli krüpteerida
                'firstname' => $googleUser->getName(), // Või kasutage sobivat meetodit nime saamiseks
                'lastname' => $googleUser->getName(), // Kui vajalik
                // Lisage siia teised vajalikud väljad
            ]
        );
    
        $token = $user->createToken('authToken')->plainTextToken;
    
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
           
    } 


}
