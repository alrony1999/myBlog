<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function dashboard()
    {
        $posts=Post::where('author_id', auth()->id())->search(request('search'))->paginate(5)->withQueryString();
        $count=Post::where('author_id', auth()->id())->count();
        return view('author.dashboard', [
            'posts'=>$posts,
            'count'=>$count
        ]);
    }
    public function postList()
    {
        return view('author.posts');
    }
}
