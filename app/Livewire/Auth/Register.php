<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Title("Đăng ký tài khoản")]
    #[Validate('required', message: 'Tên bắt buộc phải nhập')]
    public $name = '';

    #[Validate('required', message: 'Email bắt buộc phải nhập')]
    #[Validate('email', message: 'Email không đúng định dạng')]
    #[Validate('unique:users,email', message: 'Email đã được sử dụng')]
    public $email = '';

    #[Validate('required', message: 'Mật khẩu bắt buộc phải nhập')]
    public $password = '';

    #[Validate('same:password', message: 'Mật khẩu nhập lại không khớp')]
    public $confirm_password = '';

    public function handleRegister()
    {
        $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
        $user = new User();
        $user->fill($data);
        $user->save();
        //Dispatch Queue
        // SendEmailVerify::dispatch($user);
        event(new Registered($user)); //Gửi email
        Auth::login($user);
        return $this->redirect('/email/verify', true);
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.auth');
    }
}