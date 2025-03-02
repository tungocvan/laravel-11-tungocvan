<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ResetPassword extends Component
{
    #[Title("Đặt lại mật khẩu")]
    public $token;
    #[Url]
    public $email = '';

    #[Validate('required', message: 'Mật khẩu bắt buộc phải nhập')]
    public $password = '';

    #[Validate('same:password', message: 'Mật khẩu nhập lại không khớp')]
    public $confirm_password = '';

    public function mount($token)
    {
        $this->token = $token;
    }
    public function render()
    {
        return view('livewire.auth.reset-password')->layout('components.layouts.auth');
    }
    public function handleUpdatePassword()
    {
        $this->validate();
        $data = [
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->confirm_password,
            'token' => $this->token
        ];
        $status = Password::reset(
            $data,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        if ($status != Password::PASSWORD_RESET) {
            session()->flash('msg', 'Đã có lỗi xảy ra. Bạn không thể đặt mật khẩu');
            return;
        }
        session()->flash('msg', 'Thay đổi mật khẩu thành công');
    }
}