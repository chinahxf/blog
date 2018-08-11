<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function qq()
    {
        return Socialite::with('qq')->redirect();
    }
    public function qqcallback()
    {
        $user = Socialite::driver('qq')->user();
        dd($user);
    }
}
