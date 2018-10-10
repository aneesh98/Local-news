@extends('layouts.format')
@section('content')
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="well margins">
            <h3><a href="viewposts/{{$post->id}}">{{$post->title}}</a></h3>
            <h4><a class="btn-danger" href="deletepost/{{$post->id}}">DELETE</a></h4>
            
            </div>
        @endforeach
    @endif
@endsection