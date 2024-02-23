<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password, $remember = false;

    // method untuk rules validation, otomatis ke bind sama $this->validate
    public function rules()
    {
        return [
            'email' => 'required|email:dns',
            'password' => 'required',
        ];
    }

    public function login()
    {
        // validasi input user
        $this->validate();

        // jika user gagal login, tampilkan pesan error
        if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            // tambahkan error, dengan key email dan pesan default jika otentikasi gagal
            $this->addError('email', __('auth.failed'));
            return null;
        }

        return redirect()->route('redirect');
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth')->section('content');
    }
}
