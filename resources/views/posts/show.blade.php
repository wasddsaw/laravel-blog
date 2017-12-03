@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{!!$post->body!!}</p>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if (!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a class="btn btn-warning" href="/lsapp/public/posts/{{$post->id}}/edit" role="button">edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                {{ Form::hidden('_method','DELETE')}}
                {{ Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
     @endif
@endsection