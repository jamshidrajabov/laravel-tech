@extends('layouts.main')
@section('title','Postlar')

@section('content')
   <!-- Page Header Start -->
   <div class="container-fluid bg-primary py-5 mb-5">
    <div class="container py-5">
        <div class="row align-items-center py-4">
            <div class="col-md-6 text-center text-md-left">
                <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">Blog</h1>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <div class="d-inline-flex align-items-center">
                    <a class="btn btn-sm btn-outline-light" href="/">Bosh sahifa</a>
                    <i class="fas fa-angle-double-right text-light mx-2"></i>
                    <a class="btn btn-sm btn-outline-light disabled" href="">Blog</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Page Header End -->


<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col-lg-6">
                <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>
                <h1 class="section-title mb-3">Oxirgi postlar</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded w-100" src="{{asset('storage/'.$post->photo)}}" alt="">
                    <div class="blog-date">
                        <h4 class="font-weight-bold mb-n1">01</h4>
                        <small class="text-white text-uppercase">Jan</small>
                    </div>
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
                    <a class="text-secondary text-uppercase font-weight-medium" href="">{{$post->category->name}}</a>
                </div>
                <h5 class="font-weight-medium mb-2">{{$post->title}}</h5>
                <p class="mb-4">{{$post->short_content}}</p>
                <a class="btn btn-sm btn-primary py-2" href="{{route('posts.show',['post'=>$post->id])}}">Batafsil</a>
            </div>
            @endforeach
            <br>
                       <!--
            <div class="col-12">
                <nav aria-label="Page navigation">
                  <ul class="pagination pagination-lg justify-content-center mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>
            -->
        </div>
        {{$posts->links()}}
    </div>
</div>
<!-- Blog End -->
@endsection()