<?php

namespace App\Http\Controllers\Portal;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function qq()
    {
        return Socialite::with('qq')->redirect();
    }
    public function qqcallback(Request $request)
    {
        $user = Socialite::driver('qq')->user();
        $user_login = User::where("oauth_id",$user->id)->where("oauth_type",'qq')->first();
        if (!$user_login){
            $user_login = new User();
            $user_login->oauth_id = $user->id;
            $user_login->oauth_type = 'qq';
        }
        $user_login->name = $user->nickname;
        $user_login->email = $user->email;
        $user_login->photo = $user->user['figureurl'];
        $user_login->login_ip = $request->getClientIp();
        if ($user_login->save()){
            Auth::loginUsingId($user_login->id);
        }
        return redirect("/");
    }
    public function weibo()
    {
        return Socialite::with('weibo')->redirect();
    }
    public function weibocallback(Request $request)
    {
        $user = Socialite::driver('weibo')->user();
        $user_login = User::where("oauth_id",$user->id)->where("oauth_type",'weibo')->first();
        if (!$user_login){
            $user_login = new User();
            $user_login->oauth_id = $user->id;
            $user_login->oauth_type = 'weibo';
        }
        $user_login->name = $user->nickname;
        $user_login->email = $user->email;
        $user_login->photo = $user->avatar;
        $user_login->login_ip = $request->getClientIp();
        if ($user_login->save()){
            Auth::loginUsingId($user_login->id);
        }
        return redirect("/");
    }
}
