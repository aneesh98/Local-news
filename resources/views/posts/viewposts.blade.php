@extends('layouts.format')
@section('content')
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="well margins">
            <h3><a href="viewposts/{{$post->id}}">{{$post->title}}</a></h3>
            </div>
        @endforeach
    @endif
@endsection