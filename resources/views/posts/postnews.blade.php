@extends('layouts.format')

@section('content')
    <h1> Post your news article </h1>
    {!! Form::open(['action'=>'ArticlesController@StorePost', 'method'=>'POST' ,'class'=>'post']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control' ,'placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control' ,'placeholder'=>'Body of your text...'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection