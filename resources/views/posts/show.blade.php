@extends('layouts.main')
@section('title','Post')

@section('content')
   <!-- Page Header Start -->
   <div class="container-fluid bg-primary py-5 mb-5">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">Batafsil</h1>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <div class="d-inline-flex align-items-center">
                    <a class="btn btn-sm btn-outline-light" href="/">Bosh sahida</a>
                    <i class="fas fa-angle-double-right text-light mx-2"></i>
                    <a class="btn btn-sm btn-outline-light disabled" href="">Batafsil</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Detail Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="text-right">
                    <a class="btn btn-sm btn-dark" href="{{route('posts.edit',['post'=>$post->id])}}">Tahrirlash</a>
                    <form method="POST"  action="{{route('posts.destroy',['post'=>$post->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <br>
                        <button type="submit" class="btn btn-sm btn-danger">O`chirish</button>
                    </form> 
                </div>
                <div class="mb-5">
                    
                    <div class="d-flex mb-2">
                        <a class="text-secondary text-uppercase font-weight-medium" href="">{{$post->created_at}}</a>
                    </div>
                    <div class="d-flex mb-2">
                        @foreach ($post->Tags as $tag)
                        <a class="text-danger text-uppercase font-weight-medium" >{{$tag->name}}</a>
                      @if ($loop->last)
                          
                      @else
                      <span class="text-primary px-2">|</span>
                      @endif                   
                       
                        @endforeach
                        
                    </div>
                    <div class="d-flex mb-2">
                        
                        <a class="text-white d-flex flex-column text-center bg-secondary rounded mb-3 py-2 px-4" href="">{{$post->category->name}}</a>
                    </div>
                    <h1 class="section-title mb-3">{{$post->title}}</h1>
                </div>
                <div class="mb-5">
                    <img style="height: 400px; width:100px" class="img-fluid rounded w-100 mb-4" src="{{asset('storage/'.$post->photo)}}" alt="Image">
                    <p>{{$post->content}}</p>                   
                        est
                        sanctus sanctus. Clita dolores sit kasd diam takimata justo diam lorem sed. Magna amet sed
                        rebum
                        eos. Clita no magna no dolor erat diam tempor rebum consetetur, sanctus labore sed nonumy
                        diam
                        lorem amet eirmod. No at tempor sea diam kasd, takimata ea nonumy elitr sadipscing gubergren
                        erat. Gubergren at lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                        sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam dolores
                        takimata
                        dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna sea at sed et eos. Accusam
                        eirmod
                        kasd lorem clita sanctus ut consetetur et. Et duo tempor sea kasd clita ipsum et. Takimata
                        kasd
                        diam justo est eos erat aliquyam et ut. Ea sed sadipscing no justo et eos labore, gubergren
                        ipsum magna dolor lorem dolore, elitr aliquyam takimata sea kasd dolores diam, amet et est
                        accusam labore eirmod vero et voluptua. Amet labore clita duo et no.</p>
                </div>
                <div class="mb-5">
                    <h3 class="mb-4 section-title">{{$post->comments()->count()}} comment </h3>
                    @foreach ($post->comments as $comment)
                    <div class="media mb-4">
                        <img src="/img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6>{{$comment->user->name}}<small><i> {{$comment->created_at}}</i></small></h6>
                            <p>{{$comment->body}}</p>
                            <!--
                            <button class="btn btn-sm btn-light">Reply</button>
                            -->
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>

                <div class="bg-light rounded p-5">
                    <h3 class="mb-4 section-title">Izoh qoldirish</h3>
                    <form action="{{route('comments.store')}}"  method="POST">
                        @csrf
                        <!-- 
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website">
                        </div>
                        -->

                        <div class="form-group">
                            <label for="message">Xabar *</label>
                            <textarea name="body" id="message" cols="30" rows="6" class="form-control"></textarea>
                        </div>
                        <input name="post_id" type="hidden" value="{{$post->id}}" class="btn btn-primary">
                        <div class="form-group mb-0">
                            <input type="submit" value="Jo`natish" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4">
                    <img src="/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                    <h3 class="text-white mb-3">John Doe</h3>
                    <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                        ipsum
                        ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr ea sit.</p>
                </div>
                <div class="mb-5">
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control" style="padding: 25px;" placeholder="Keyword">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h3 class="mb-4 section-title">Kategoriyalar</h3>
                    <ul class="list-inline m-0">
                        @foreach ($categories as $category)
                        <li class="mb-1 py-2 px-3 bg-light d-flex justify-content-between align-items-center">
                            <a class="text-dark" href="#"><i class="fa fa-angle-right text-secondary mr-2"></i>{{$category->name}}</a>
                            <span class="badge badge-primary badge-pill">{{$category->posts()->count()}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-5">
                    <h3 class="mb-4 section-title">Taglar</h3>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($tags as $tag)
                        <a href="" class="btn btn-outline-secondary m-1">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
               
                <div class="mb-5">
                    <h3 class="mb-4 section-title">Oxirgi postlar</h3>
                    @foreach ($recent_posts as $recent_post)
                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                        <img class="img-fluid rounded" src="{{asset('storage/'.$recent_post->photo)}}" style="width: 80px; height: 80px; object-fit: cover;" alt="">
                        <div class="d-flex flex-column pl-3">
                            <a class="text-dark mb-2" href="">{{$recent_post->title}}</a>
                            <div class="d-flex">
                                <small><a class="text-secondary text-uppercase font-weight-medium" href="">Admin</a></small>
                                <small class="text-primary px-2">|</small>
                                <small><a class="text-secondary text-uppercase font-weight-medium" href="">Cleaning</a></small>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <img src="/img/blog-2.jpg" alt="" class="img-fluid rounded">
                </div>
               
                <div class="mb-5">
                    <img src="/img/blog-3.jpg" alt="" class="img-fluid rounded">
                </div>
                <div>
                    <h3 class="mb-4 section-title">Plain Text</h3>
                    Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no
                    consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos
                    tempor
                    rebum dolor, tempor takimata clita sit et elitr ut eirmod.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail End -->
@endsection()