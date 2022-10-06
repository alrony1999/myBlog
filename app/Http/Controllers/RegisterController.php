<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $fields=request()->validate([
            'name'=>'required|min:5',
            'username'=>'required|min:5|max:255|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:255'
        ]);
        $user=User::create($fields);
        return redirect('/login')->with('success', 'Account successfully registered.');
    }
}
