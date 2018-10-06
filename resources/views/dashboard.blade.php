

@extends('layouts.format')

@section('content')
    <div class="well division">
<img src="{{url('/storage/cover_images/'.Session::get('userdetail')->cover_image)}}" class="img-circle" ></img>
    <h1>Welcome Back {{Session::get('userdetail')->username}} !!</h1>
    <button class="btn btn-primary" onclick="location.href = '{{url('logout')}}';">LOG OUT</button>
    <button class="btn btn-primary" onclick="location.href = '{{url('postarticle')}}';">POST AN ARTICLE</button>
    <button class="btn btn-primary" onclick="location.href = '{{url('viewposts')}}';">VIEW YOUR POSTS</button>
    </div>
@endsection
