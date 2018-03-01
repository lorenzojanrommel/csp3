<div id="editUser{{$user->id}}" class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-default">
                        <div class="card-header">Edit</div>

                        <div class="card-body">
                            <form method="POST" action="{{ url('edit-user') }}" class="edit-user-via-admin">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="edit-name{{$user->id}}" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus value="{{$user->name}}">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="edit-email{{$user->id}}" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                  <div class="col-md-6">
                                  <select class="form-control" name="status" id="edit-status{{$user->id}}">
                                    @if($user->user_status == 1)
                                    <option value="1" selected>Active</option>
                                    <option value="2">Deactivated</option>
                                    @elseif($user->user_status == 2)
                                    <option value="2" selected>Deactivated</option>
                                    <option value="1">Activate</option>
                                    @endif
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
                                  <div class="col-md-6">
                                  <select class="form-control" name="role" id="edit-role{{$user->id}}">
                                    @if($user->user_role == 1)
                                    <option value="1" selected>Admin</option>
                                    <option value="2">Regular</option>
                                    @else($user->user_role == 2)
                                    <option value="2" selected>Regular</option>
                                    <option value="1">Admin</option>
                                    @endif
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary float-right editme" data-id="{{$user->id}}">
                                            Save
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>