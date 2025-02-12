<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }
}

