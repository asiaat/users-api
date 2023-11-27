<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect()
    {
        //return Socialite::driver('google')->redirect();
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();

        // Teisendage kasutaja andmed massiiviks või objektiks, mida saab JSON-na tagastada
        $userData = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            // ja nii edasi, sõltuvalt sellest, milliseid andmeid soovite edastada
        ];

        // Tagastage andmed JSON formaadis
        return response()->json($userData);
           
    } 


}
