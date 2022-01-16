<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.login.login');
    }

    public function dashboard(){
        return view('admin.home.home');
    }
}
