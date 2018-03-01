@extends('layouts.app')

@section('content')
<div class="profile-to-refresh p-3">
<div class="container mb-5 pb-5">
    <div class="row mb-5">
    	<div class="col-md-4">
    		<div class="card card-default mb-4">
    		    <div class="card-header">Profile</div>
    		    	<div class="card-body">
    		    		<table class="table">
    		    			<tr>
    		    				<th>{{ Auth::user()->name}}</th>
    		    				<th>Post</th>
    		    			</tr>
    		    			<tr>
    		    				<td></td>
    		    				<td>{{ count($posts)}}</td>
    		    			</tr>
    		    		</table>
    		    	</div>
    		</div>
    	</div>
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary float-right">Create Blog</a>
                    <h3>Blog Post</h3>
                    @if(count($posts) > 0)
                    <table class="table table-stripped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td><a href="single_post/{{$post->id}}">{{$post->title}}</a></td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePost{{$post->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </td>
                            </tr>
						@include('admin.delete_post_modal')
                        @endforeach
                    </table>
                    @else
                        <p>You have no posts</p>
                    @endif
    	</div>
    </div>
</div>
</div>
@include('posts.modal_create_post')
@endsection
