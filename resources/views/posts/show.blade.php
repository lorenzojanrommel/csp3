@extends('layouts.app')

@section('content')
	<div class="container">
	<div class="refresh mb-5">
	<a href="/posts" class="btn btn-outline-info">Go Back</a>
	<!--Card-->
	   <div class="card card-cascade wider reverse my-4">

	       <!--Card image-->
	       <div class="view overlay">
	           <img class="img-fluid" src="/storage/cover_images/{{$post->cover_image }}" alt="{{$post->title}}">
	           <a href="#!">
	               <div class="mask rgba-white-slight"></div>
	           </a>
	       </div>
	       <!--/Card image-->
	       <hr>
	       <!--Card content-->
	       <div class="card-body text-center">
	           <!--Title-->
	           <h4 class="card-title"><strong>{{$post->title}}</strong></h4>
	           <small>{{$post->created_at}} Written by: {{$post->user->name}}</small>
	           <p class="card-text">{!!$post->body!!}</p>
	       </div>
	       <!--/.Card content-->
	          <div class="col-md-12 col-sm-12">
	       		<h4>Comments</h4>
	       	 	<ul class="list-group comments">
	       	 	@foreach($post->comment as $comment)
	       	 	<!--First row-->
	       	 	    <div class="row mb-4 ml-2 bg-light mr-2 p-1 rounded">
	       	 	        <!--Content column-->
	       	 	        <div class="col-sm-12">
	       	 	        	<div class="col-sm-12">
		       	 	            <h4 class="font-weight-bold" style="display: inline-block;">{{$comment->user->name}}</h4>
		       	 	            @if(Auth::user()->id == $comment->user_id)
		       	 	            <span class="float-right text-muted" id="dropdownEditDelete" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></span>
		       	 	            <ul>
		       	 	            <div class="dropdown-menu" aria-labelledby="dropdownEditDelete">
		       	 	              <li class="dropdown-item" data-toggle="modal" href="#" data-target="#commentEditModal{{$comment->id}}">Edit</li>
		       	 	              <li class="dropdown-item" data-toggle="modal" href="#" data-target="#commentDeleteModal{{$comment->id}}" value="{{$comment->id}}">Delete</li>
		       	 	            </div>
		       	 	            </ul>
		       	 	            @endif
	       	 	        	</div>
	       	 	            <p class="grey-text ml-3">{{ $comment->comment }}</p>
	       	 	            <div class="mt-0">
	       	 	                <ul class="list-unstyled">
	       	 	                    <li class="comment-date">
	       	 	                        <i class="fa fa-clock-o"></i>{{$comment->updated_at->diffForHumans()}}</li>
	       	 	                </ul>
	       	 	            </div>
	       	 	        </div>
	       	 	        <!--/.Content column-->
	       	 	    </div>
	       	 	    <!--/.First row-->
	       		@include('comments.modal_edit_comment')
	       		@include('comments.modal_delete_comment')
	       	 	@endforeach
	       	 </ul>
	       	<div class="col-md-12 col-sm-12 mb-4">
	       		<form action="/comments/{{$post->id}}" method="POST" enctype="multipart/form-data" class="addComment">
	       			@csrf
	       			<div class="col-md-12 col-sm-12">
	       				<div class="form-group">
	                  		<label class="control-label col-sm-12" for="comment">Post Comment</label>
	                  	<div class="col-sm-12">
	                      	<input type="text" class="form-control" name="comment" id="input-comment">
	                  	</div>
	              		</div>
	              		<div class="col-md-2 col-sm-2">
	       					<button class="btn btn-outline-info add-comment">Add Comment</button>
	       				</div>
	              	</div>
	       		</form>
	       	</div>
	       </div>
	       </div>
	   </div>
	   <!--/.Card-->
	   </div>
@endsection
