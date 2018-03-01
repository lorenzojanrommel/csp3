@extends('layouts.app')
    
@section('content')
	<div class="container">
	<h3>Edit Post</h3>
	<form action="{{action('PostsController@update',[$post->id])}}" method="POST" enctype="multipart/form-data">
		@method('put')
  		@csrf
		<div class="form-group">
		  <label class="col-form-label" for="inputTitle">Title</label>
		  <input type="text" class="form-control" name="title" value="{{$post->title}}" id="inputTitle">
		</div>
		<div class="form-group">
	      <label for="inputBody">Post Content</label>
	      <textarea class="form-control" id="article-ckeditor" name="body" rows="3">{{$post->body}}</textarea>
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


 