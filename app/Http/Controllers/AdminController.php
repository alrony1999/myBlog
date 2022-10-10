<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $search=request('search')??null;

        $authors=User::latest()->where('utype', 'AU')->search(request('search'))->paginate(5)->withQueryString();

        $count=User::where('utype', 'AU')->count();

        return view('admin.dashboard', [
            'authors'=>$authors,
            'count'=>$count
        ]);
    }
    public function create()
    {
        return view('admin.add-author');
    }
    public function store()
    {
        $fields=request()->validate([
                    'name'=>'required|min:5',
                    'username'=>'required|min:5|max:255|unique:users,username',
                    'email'=>'required|email|unique:users,email',
                ]);
        $fields['password']='12345678';
        $fields['utype']='AU';
        User::create($fields);
        return redirect()->route('admin.dashboard')->with('success', 'Account successfully registered.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Done!!');
    }
}
