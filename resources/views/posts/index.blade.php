@extends('layouts.app')

@section('content')
	<div class="container">
	{{-- <a href="/posts/create">Create Post</a> --}}
	<div class="container-fluid p-3">
	<div class="float-right">
		<a href="" data-toggle="modal" name="new" id="new" data-target="#createModal" class="btn btn-primary">Create New Post</a>
    </div>
    {{-- <button class="btn btn-info float-right" data-toggle="modal" data-target="#createmodal"></button> --}}
	<h3>Posts</h3>
	</div>
	@if(count($posts) > 0)
	<div class="refresh">
		@foreach($posts as $post)
			<!--Grid row-->
			    <div class="row mt-3 wow zoomInUp" data-wow-delay="0.2s">

			        <!--Grid column-->
			        <div class="col-lg-5 col-xl-4 mb-4">
			            <!--Featured image-->
			            <div class="view overlay rounded z-depth-1">
			                <img class="img-fluid" src="/storage/cover_images/{{$post->cover_image }}" alt="{{$post->title}}">
			                <a>
			                    <div class="mask rgba-white-slight"></div>
			                </a>
			            </div>
			        </div>
			        <!--Grid column-->

			        <!--Grid column-->
			        <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
			            <h3 class="mb-3 font-weight-bold dark-grey-text">
			                <strong>{{$post->title}}</strong>
			            </h3>
			            <p class="grey-text text-justify">{!!$post->body!!}</p>
			            <p>by
			                <a class="font-weight-bold dark-grey-text">{{$post->user->name}}</a>, {{$post->created_at}}</p>
			            <a class="btn btn-info btn-md white-text" href="posts/{{$post->id}}">Read more</a>
			        </div>
			        <!--Grid column-->

			    </div>
			    <!--Grid row-->

			    <hr class="mb-5">
		@endforeach
		 {{$posts->links()}}
		 </div>
	@else
		<p>No post found</p>
	@endif
	</div>
@include('posts.modal_create_post')
@endsection
