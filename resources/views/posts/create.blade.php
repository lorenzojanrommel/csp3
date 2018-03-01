@extends('layouts.app')
    
@section('content')
	<div class="container">
	<h3>Create Post</h3>
	<form action="{{action('PostsController@store')}}" method="POST" enctype="multipart/form-data">
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<div class="form-group">
		  <label class="col-form-label" for="inputTitle">Title</label>
		  <input type="text" class="form-control" name="title" placeholder="Input Title" id="inputTitle">
		</div>
		<div class="form-group">
	      <label for="inputBody">Post Content</label>
	      <textarea class="form-control" id="article-ckeditor" name="body" rows="3"></textarea>
	     {{--  <textarea class="form-control" name="body" rows="3"></textarea> --}}
	    </div>
	    <div class="form-group">
	    	<input type="file" name="cover_image">
	    </div>
	    <button type="submit" class="btn btn-outline-info">Submit</button>
	</form>
	</div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection