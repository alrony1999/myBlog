<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }
    public function store()
    {
        request()->validate([
            'email'=>'required|email',
            'password'=>'required|'
        ]);

        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session()->flash('success', 'Signed in');

            $utype=auth()->user()->utype;

            if ($utype==="N") {
                return redirect('/index');
            } elseif ($utype==="AU") {
                return redirect('/author/dashboard');
            } elseif ($utype==="AD") {
                return redirect('/admin/dashboard');
            } else {
                session()->flush();
                return redirect('/login');
            }
        }

        return redirect("login")->with('failed', 'Login details are not valid');
    }
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login')->with('success', 'Logout successfully!');
    }
}
