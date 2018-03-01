@extends('Layouts.app')

@section('title')

	User List

@endsection

@section('content')
	<div class="container">
	<h3>Users List</h3>
	<div class="col-md-6 float-right mb-2">
	<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addAdmin">Add Admin</button>
	</div>
	@if(count($users) > 0)
	<div class="user-list-refresh">
	@include('admin.register_admin')
	<table class="table table-responsive-sm table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Status</th>
				<th>Role</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				@if($user->user_status == 1)
				<td>Active</td>
				@else
				<td>Deactivate</td>
				@endif
				@if($user->user_role == 1)
				<td>Admin</td>
				@else
				<td>Regular</td>
				@endif
				<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editUser{{$user->id}}"><i class="fa fa-edit" aria-hidden="true"></i></button></td>
				@if(Auth::user()->id !== $user->id)
				<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser{{$user->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
				@else
				<td></td>
				@endif
			</tr>
			@include('admin.delete_user_modal')
			@include('admin.edit_user_modal')
		@endforeach
		</tbody>
	@else
		<p>No users Found</p>
	@endif

	</table>
		{{$users->links()}}
	</div>
	</div>
@endsection