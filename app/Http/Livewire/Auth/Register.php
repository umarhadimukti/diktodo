<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $username, $email, $password, $password_confirmation;
    public $showPassword = false;

    // method untuk rules validation, otomatis ke bind sama $this->validate
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:30'],
            'username' => ['required', 'min:3', 'max:30', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ];
    }

    public function register()
    {
        // validasi input user
        $this->validate();

        // insert ke database
        $user = User::create([
            'role_id' => 2,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        // me-login-kan user yang sudah tervalidasi dan terdaftar, argumen kedua bernilai true jika ingin menggunakan fitur remember me
        Auth::login($user, true);

        return redirect()->route('redirect');
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth')->section('content');
    }
}
