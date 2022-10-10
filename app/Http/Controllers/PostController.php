<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::latest()->filter(request(['search','category','author']))->paginate(10)->withQueryString();

        return view('posts.index', ['posts'=>$posts]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ['post'=>$post]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $attributes=request()->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug',
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>'required',
            'thumbnail'=>'required|image'
        ]);
        $attributes['author_id']=auth()->id();
        $image=request()->file('thumbnail');
        $filename=time().'.'.$image->extension();
        $attributes['thumbnail']=$filename;
        $image->move(public_path('images/posts'), $filename);

        Post::create($attributes);
        return back()->with('success', 'Done');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post'=>$post
        ]);
    }

    public function update(Post $post)
    {
        $image=request()->file('new-thumbnail');
        $attributes=request()->validate([
                   'title'=>'required',
                   'slug'=>Rule::unique('posts', 'slug')->ignore($post->id),
                   'excerpt'=>'required',
                   'body'=>'required',
                   'category_id'=>'required',
                   'new-thumbnail'=>isset($image) ? ['image'] : ''
               ]);

        if ($image) {
            $filename=time().'.'.$image->extension();
            $attributes['thumbnail']=$filename;
            unlink(public_path('images/posts/'.$post->thumbnail));
            $image->move(public_path('images/posts'), $filename);
        };
        $post->update($attributes);
        return redirect()->route('author.dashboard')->with('success', 'Done');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', "Done");
    }
}
