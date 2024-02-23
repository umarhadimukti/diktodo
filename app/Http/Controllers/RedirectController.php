<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function check()
    {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin.todo.dashboard');
        } else {
            return redirect()->route('user.todo.home');
        }
    }
}
