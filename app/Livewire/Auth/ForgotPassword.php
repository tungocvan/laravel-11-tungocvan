<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    #[Title("Quên mật khẩu")]

    #[Validate('required', message: 'Email bắt buộc phải nhập')]
    #[Validate('email', message: 'Email không đúng định dạng')]
    #[Validate('exists:users,email', message: 'Email không tồn tại trong hệ thống')]
    public $email = "";

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('components.layouts.auth');
    }

    public function handleSendEmail()
    {
        $this->validate();
        $status = Password::sendResetLink(
            ['email' => $this->email]
        );
        if ($status != Password::RESET_LINK_SENT) {
            session()->flash('msg', 'Đã có lỗi xảy ra. Bạn không thể lấy lại mật khẩu lúc này');
            return;
        }
        session()->flash('msg', 'Vui lòng kiểm tra email để lấy lại mật khẩu');
    }
}