<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user_admin = Auth()->user()->hasRole('Admin');
        $user = Auth()->user()->hasRole('User');

        if ($user_admin) {
            return view('backend.admin.dashboard');
        } else if ($user) {
            return view('backend.users.dashboard');
        } else {
            return view('dashboard');
        }
    }
}
