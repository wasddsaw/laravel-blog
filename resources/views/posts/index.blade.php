@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                     <div class="row">
                        <div class="col-sm">   
                            <?php $image = $post->cover_image; ?>
                            <img src="/public/cover_images/ionic-meta_1511947166.jpg" class="img-fluid">
                            
                        </div>
                        <div class="col-sm">  
                            <h3 class="card-title"><a href="/lsapp/public/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <p class="card-text"><small class="text-muted">Written on  {{$post->created_at}} by {{$post->user->name}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
        {{$posts->links()}}
    @else 
       <p>No posts found</p>
    @endif
@endsection