@extends('Layouts.app')

@section('title')

	Dashboard

@endsection

@section('content')
	<div class="container  p-5 mb-4">
	<h3><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</h3>
	<hr>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-4">
			<a href="/posts">
				<div class="card text-white bg-success mb-3">
				  <div class="card-header text-center"><h4>Posts</h4></div>
				  <div class="card-body">
				    <h5 class="text-center">{{ count($posts)}}</h5>
				  </div>
				</div>
			</a>
			</div>
			<div class="col-md-4 mb-5">
				<a href="/user-list">
				<div class="card text-white bg-info mb-3">
				  <div class="card-header text-center"><h4>Users</h4></div>
				  <div class="card-body">
				    <h5 class="text-center">{{ count($users)}}</h5>
				  </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	</div>
@endsection