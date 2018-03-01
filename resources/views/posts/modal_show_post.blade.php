
<div class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">  
        <h5 class="modal-title">{{$post->title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{!! $post->body !!}</p>
      </div>
{{--       <div class="modal-footer">
        <a href="" data-toggle="modal" data-target=".edit-modal" data-id="{{$post->id}}" class="btn btn-primary">Edit</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
      </div> --}}
    </div>
  </div>
</div>