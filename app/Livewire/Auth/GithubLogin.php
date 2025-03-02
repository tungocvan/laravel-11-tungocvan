<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubLogin extends Component
{
    public function render()
    {
        $path = request()->path();
        if ($path == 'auth/github/callback') {
            $this->handleCallback();
        }
        return view('livewire.auth.github-login')->layout('components.layouts.auth');
    }

    public function handleCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::firstOrCreate(
            [
                'email' => "{$githubUser->nickname}@localhost"
            ],
            [
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => "{$githubUser->nickname}@localhost",
                'password' => Hash::make(uniqid()),
                'email_verified_at' => date('Y-m-d H:i:s')
            ]
        );
        Auth::login($user);
        $user = Auth::user();
        $user->last_session_id = session()->getId();
        $user->save();
        return $this->redirect('/', true);
    }

    public function handleGithubLogin()
    {
        $redirectUrl = Socialite::driver('github')->redirect()->getTargetUrl();

        return $this->redirect($redirectUrl);
    }
}