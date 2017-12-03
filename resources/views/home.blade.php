@extends('layouts.app')

@section('content')
    <div class="card">
    <h4 class="card-header">Dashboard  <a href="/lsapp/public/posts/create" class="btn btn-primary float-right">Create Post</a></h4>
    <div class="card-body">
        <h4 class="card-title">Your Blog Posts</h4>
       
        @if(count($posts) > 0)
          <table class="table">
            <thead>
                <tr>
                <th scope="col">Title</th>
                <th scope="col">Update</th>
                <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                <td>{{$post->title}}</td>
                <td><a class="btn btn-warning" href="/lsapp/public/posts/{{$post->id}}/edit" role="button">edit</a></td>
                <td> 
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                    {{ Form::hidden('_method','DELETE')}}
                    {{ Form::submit('Delete',['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                </td>
                </tr>
             @endforeach
            </tbody>
            </table>
        @else
        <p class="card-text">You have no post!!</p>
        @endif    
    </div>
    </div>
@endsection
