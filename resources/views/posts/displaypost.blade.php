@extends('layouts.format')
@section('content')
    <h1>{{$article->title}}</h1>
    <h3>{!!$article->text!!}</h3>
    
    
@endsection