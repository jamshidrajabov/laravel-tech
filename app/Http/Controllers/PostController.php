<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
   $posts=Post::latest()->paginate(6);
    return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create',[
            'categories'=>Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {   
        $path='post-photos/blank-user.png';
        if ($request->hasFile('photo'))
        {
            $timestamp = time();
            $name=$request->ip()."_".$timestamp;
            $path=$request->file('photo')->storeAs('post-photos',$name);   
        }
        $post=Post::create([
            'user_id' => 1,
            'title'=>$request->title,
            'category_id' => $request->category_id,
            'short_content'=>$request->short_content,
            'content'=>$request->content,
            'photo'=>$path
        ]);
        if (isset($request->tags))
        {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recent_posts=Post::latest()->get()->except($id)->take(5);
        $post=Post::find($id);
        return view('posts.show',[
            'post'=>$post,
            'recent_posts'=>$recent_posts,
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',[
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $path=$post->photo;
        if ($request->hasFile('photo'))
        {
            if (isset($post->photo))
            {
                if ($post->photo!='post-photos/blank-user.png')
                    {
                        storage::delete($post->photo);
                    }
            }
                $timestamp = time();
                $name=$request->ip()."_".$timestamp;
                $path=$request->file('photo')->storeAs('post-photos',$name);
        }
            $post->update([
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'content'=>$request->content,
            'photo'=>$path
        ]);
        return redirect(route('posts.show',[
            'post'=>$post->id 
            ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (isset($post->photo))
            {
                if ($post->photo!='post-photos/blank-user.png')
                    {
                        storage::delete($post->photo);
                    }
            }
        $post->delete();
            return redirect(route('posts.index'));
    }
    public function delete_image(Post $post)
    {   if ($post->photo!='post-photos/blank-user.png')
        {
            storage::delete($post->photo);
            $post->photo='post-photos/blank-user.png';
            $post->save();
        }
        
        return redirect(route('posts.edit',[
        'post'=>$post->id 
        ]));
    }
}
