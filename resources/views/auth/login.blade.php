@extends('layouts.auth')
@section('title','Kirish')
@section('content')
<div class="panel-heading">
    <h3 class="pt-3 font-weight-bold">Kirish</h3>
</div>
<div class="panel-body p-3">
    <form action="{{route('authenticate')}}" method="get">
        @csrf
        <div class="form-group py-2">
            <div class="input-field"> 
                <span class="far fa-user p-2"></span> 
                <input name="email" type="text" placeholder="Elektron pochta" required> 
            </div>
        </div>
        <div class="form-group py-1 pb-2">
            <div class="input-field"> 
                <span class="fas fa-lock px-2"></span> 
                <input name="password" type="password" placeholder="Parol" required> 
                <button class="btn bg-white text-muted"> 
                    <span class="far fa-eye-slash"></span> 
                </button> 
            </div>
        </div>
        <div class="form-inline"> 
            <input type="checkbox" name="remember" id="remember"> 
            <label for="remember" class="text-muted">Eslab qol</label> 
            <a href="#" id="forgot" class="font-weight-bold">Parolni unutdingizmi?</a> 
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3" >Kirish</button>
        <div class="text-center pt-4 text-muted">Ro`yxatdan o`tmadingizmi? 
            <a href="#">Ro`yxatdan o`tish</a> 
        </div>
    </form>
</div>
@endsection