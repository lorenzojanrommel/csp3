<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        //  
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::orderBy('created_at', 'desc')->take(1) ->get();
        // return view ('posts.index', compact('posts'));
        
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view ('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create'); 
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
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
         if ($request->hasFile('cover_image')) {
             // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNametoStore = $filename.'_'.time().'_'.$extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);
         }else{
            $fileNametoStore = 'noimage.png';
         }
                
        // Create new Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNametoStore;
        $post->save();
        // return $request->all();
        return redirect('/profile')->with('success', 'Post Created');
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
        return view('posts.show')->with('post' , $post);
        // return view('posts.modal_show_post', ['post' => $post])->render();
        // return view('admin.modalview', ['sd' => $sd])->render();
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

        // Check correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect ('/posts')->with('error' , 'Unauthorized Page');
        }else{
            return view('posts.edit')->with('post' , $post);
        }
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
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

         // Handle File Upload
         if ($request->hasFile('cover_image')) {
             // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNametoStore = $filename.'_'.time().'_'.$extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);
         }
        
        // Update new Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
        $post->cover_image = $fileNametoStore;
        }
        $post->save();

        return redirect('/profile')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Check correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect ('/posts')->with('error' , 'Unauthorized Page');
        }
        if ($post->cover_image != 'noimage.png') {
            // Delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
    }
}
