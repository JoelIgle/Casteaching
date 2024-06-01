<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callBack()
    {

        try {
            $githubUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Error authenticating with Github' . $e->getMessage()]);
        }
        $user = User::createUserFromGithub($githubUser);

        Auth::login($user);
        return redirect('/dashboard');
    }
}
