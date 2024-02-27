@extends('layouts.main')
@section('title','Tahrirlash')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col-lg-6">
                <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Post yaratish</h6>
                <h1 class="section-title mb-3">Postni tahrirlash</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="{{route('posts.update',[
                        'post'=>$post->id
                    ])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-12 control-group">
                                <input type="text" class="form-control p-4" name="title" placeholder="Sarlavha" value="{{$post->title}}">
                                <p class="help-block text-danger"> 
                                    @error('title')
                                    <div style="color: red" class="">{{ $message }}</div>
                                    @enderror
                                </p>
                            </div>
                                <div class="col-sm-12 control-group">
                                    <img src="{{asset('storage/'.$post->photo)}}" alt="">
                                    <a class="btn btn-sm btn-danger" href="{{route('delete_image',['post'=>$post->id])}}">Rasmni o`chirish</a>
                                <br>
                                <label for="formFile" class="form-label">Post uchun rasm tanlang</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                                <p class="help-block text-danger"> 
                                @error('photo')
                                <div style="color: red" class="">{{ $message }}</div>
                                @enderror
                                </p>
                                </div>  
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Post haqida qisqacha">{{$post->short_content}}</textarea>
                            <p class="help-block text-danger"> 
                                @error('short_content')
                                <div style="color: red" class="">{{ $message }}</div>
                                @enderror
                            </p>
                            
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" name="content" placeholder="Post matni" >{{$post->content}}</textarea>
                            <p class="help-block text-danger"> 
                                @error('content')
                                <div style="color: red" class="">{{ $message }}</div>
                                @enderror
                            </p>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Tahrirlash</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5" style="min-height: 400px;">
                <div class="position-relative h-100 rounded overflow-hidden">
                    <img src="/img/adding.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()