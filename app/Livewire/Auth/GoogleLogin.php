<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLogin extends Component
{
    public function render()
    {
        $path = request()->path();
        if ($path == 'auth/google/callback') {
            $this->handleCallback();
        }
        return view('livewire.auth.google-login')->layout('components.layouts.auth');
    }

    public function handleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            [
                'email' => $googleUser->email
            ],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
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

    public function handleGoogleLogin()
    {
        $redirectUrl = Socialite::driver('google')->redirect()->getTargetUrl();

        return $this->redirect($redirectUrl);
    }
}