<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class VerifyEmail extends Component
{
    #[Title("Kích hoạt tài khoản")]

    public $msg = '';

    public function mount()
    {
        if (Auth::user()->email_verified_at) {
            return $this->redirect('/', true);
        }
    }
    public function render()
    {
        return view('livewire.auth.verify-email')->layout('components.layouts.auth');
    }
    public function handleResendEmail()
    {
        // ResendEmailVerify::dispatch(Auth::user());
        Auth::user()->sendEmailVerificationNotification();
        $this->msg = 'Gửi email thành công. Vui lòng kiểm tra để kích hoạt';
    }
}