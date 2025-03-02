<?php

namespace App\Livewire\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $old_password;
    public $password;
    public $confirm_password;
    public function render()
    {
        return view('livewire.account.change-password');
    }
    public function handleUpdatePassword()
    {
        $this->validate(
            [
                'old_password' => ['required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Mật này cũ không chính xác');
                    }
                }],
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
            ],
            [
                'old_password.required' => 'Vui lòng nhap mật khẩu cũ',
                'password.required' => 'Vui lòng nhap mật khẩu mới',
                'password.min' => 'Mật khẩu mới phải từ :min ký tự',
                'confirm_password.required' => 'Vui lòng nhập lại mật khẩu mới',
                'confirm_password.same' => 'Mật khẩu nhập lại không khớp',
            ]
        );

        $user = Auth::user();
        $user->password = Hash::make($this->password);
        $user->save();
        session()->flash('msg', 'Đổi mật khẩu thành công');
    }
}