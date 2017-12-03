<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    public function index()
    {   
        //$posts = Post::all();
        //$posts = Post::where('title',''Post two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('created_at','desc')->take(1)->get();
        //$posts = Post::orderBy('created_at','desc')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|max:1999' //-> set image under 2mb

         ]);

         //handle file upload
         if($request->hasFile('cover_image')){
            //get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext0
            $extension = $request->file('cover_image')->getClientOriginalExtension(); 
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->move('public/cover_images' ,$fileNameToStore);

         } else {
             $fileNameToStore = 'noimage.jpg';
         } 

         //create post

         $post = new Post;
         $post->title = $request->input('title');
         $post->body = $request->input('body');
         $post->user_id = auth()->user()->id;
         $post->cover_image = $fileNameToStore;
         $post->save();

         return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorizes Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

        'title' => 'required',
        'body' => 'required'

        ]);

        //create post

        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);

         //check for correct user
         if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorizes Page');
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
