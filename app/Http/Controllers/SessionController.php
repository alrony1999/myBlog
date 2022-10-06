<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
            return $this->dr();
        }

        return redirect("login")->with('failed', 'Login details are not valid');
    }
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login')->with('success', 'Logout successfully!');
    }
    protected function dr()
    {
        session()->flash('success', 'Signed in');

        $utype=auth()->user()->utype;

        if ($utype==="N") {
            return redirect()->route('home');
        } elseif ($utype==="AU") {
            return redirect()->route('author.dashboard');
        } elseif ($utype==="AD") {
            return redirect()->route('admin.dashboard');
        } else {
            session()->flush();
            session()->flash('failed', 'Sorry!');
            return redirect('/login');
        }
    }
}
