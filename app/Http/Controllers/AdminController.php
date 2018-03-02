<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\User;
use App\Post;


class AdminController extends Controller
{
	public function __construct()
	{
        $this->middleware(['auth', 'admin'])->except(['showProfile', 'singlePost']);
	}
    public function index (){
    	return view('admin.dashboard');
    }
    public function show(){
        $users = User::orderBy('created_at', 'asc')->paginate(10);
    	return view('admin.user-list')->with('users', $users);
    }
    public function delete($id){
        $user = User::find($id);
        if(auth()->user()->user_role == 1){
            $user->delete();
        }else {
            return redirect('/')->with('success', 'Unauthorized Page');
        }
    }
    public function showProfile() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('admin.profile')->with('posts', $user->posts);
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_status = $request->status;
        $user->user_role = $request->role;
        $user->save();
        // return redirect('/user-list')->with('success', 'Successfully Edited! Admin User.');
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_role = 1;
        $user->save();
        // return redirect('/user-list')->with('success', 'Successfully Added! Admin User.');
    }
    // view post
    public function singlePost($id){
        $post =  Post::find($id);
        return view('admin.view_single_post')->with('post' , $post);
    }
    // All post 
    public function allPost(){
        $posts = Post::all();
        $users = User::all();
        return view('admin.dashboard')->with('posts', $posts)->with('users', $users);
    }
}
