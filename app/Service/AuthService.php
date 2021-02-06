<?php
namespace App\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(\Laravel\Socialite\Contracts\User $user){
        $email = $user->getEmail();
        $name = $user->getName();
        $userData = User::where('email',$email)->first();
        if($userData){
            $userData->name = $name;
            if($userData->save()){
                Auth::login($userData);
                return redirect()->route('account');
            }
        }
        throw new \Exception("Ошибка аутентифакции");
    }

}
