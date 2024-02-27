<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {/*
     $post = Post::create([
        'title' => 'London to Paris',
        'short_content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, odit consequuntur. Architecto neque, similique dignissimos nesciunt consectetur voluptatum deserunt esse.',
        'content'=>' Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae molestias, 
        dolor expedita dolore illum, assumenda numquam repellendus tenetur hic 
        veritatis similique est eos suscipit incidunt sunt repudiandae nobis, 
        maiores corrupti tempora esse nesciunt ipsum. Iusto ab voluptatem, eaque 
        corrupti totam officiis? Excepturi error alias tempore ipsam inventore 
        corrupti est, possimus corporis saepe quia sapiente fugit, minus praesentium 
        vitae laboriosam ad voluptate? Nostrum, vero aliquid harum quasi consequatur 
        quod praesentium delectus rerum tempore suscipit voluptatibus vitae autem. 
        Earum corporis officia provident nam qui mollitia, sapiente esse tempore 
        soluta obcaecati animi necessitatibus, fugiat numquam suscipit, dicta 
        non sequi explicabo quam. Nisi, velit!',
        'photo'=>'storage/545.png'
       
    ]);*/
   $posts = Post::all();    
    return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {   if ($request->hasFile('photo'))
        {
            $timestamp = time();
            $name=$request->ip()."_".$timestamp;
            $path=$request->file('photo')->storeAs('post-photos',$name);   
        }
        $timestamp = time();
        $name=$request->ip()."_".$timestamp;
        $path=$request->file('photo')->storeAs('post-photos',$name);
        $post=Post::create([
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'content'=>$request->content,
            'photo'=>$path ?? null
        ]);
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
      
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
