<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
    }
    public function index()
    {
        return view('posts.index');
    }
}
