<?php

namespace App\Livewire\Account;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $field = null;
    // #[Validate('required', message: 'Tên bắt buộc phải nhập')]
    public $name;
    // #[Validate('required', message: 'Email bắt buộc phải nhập')]
    // #[Validate('email', message: 'Email không đúng định dạng')]
    // #[Validate('unique:users,email', message: 'Email đã được sử dụng')]
    public $email;
    public $createdAt;
    public $updatedAt;
    public $emailVerifiedAt;
    public function mount($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->createdAt = $user->created_at;
        $this->updatedAt = $user->updated_at;
        $this->emailVerifiedAt = $user->email_verified_at;
    }
    public function render()
    {
        return view('livewire.account.profile');
    }
    public function handleShowField($field)
    {
        $this->field = $field;
    }
    public function handleSave($field)
    {
        $this->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . Auth()->user()->id,
            ],
            [
                'name.required' => 'Tên không được bỏ trống',
                'email.required' => 'Email không được bỏ trống',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại trên hệ thống'
            ]
        );

        $user = Auth::user();
        $user->{$field} = $this->{$field};
        $user->save();
        $this->field = null;
        $this->dispatch('user-saved');
    }
}