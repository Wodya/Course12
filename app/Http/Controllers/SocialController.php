<?php

namespace App\Http\Controllers;

use App\Service\AuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('vkontakte')->redirect();
    }
    public function callback(AuthService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
        return $service->login($user);
    }
}
