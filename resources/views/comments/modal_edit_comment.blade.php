    <!-- Modal to edit a Comment -->
    <div id="commentEditModal{{$comment->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                 	<div class="modal-body">
                 	  <form action="" method="POST" class="editComment">
                        <div class="form-group">
                          <p><input type="text" class="form-control commentToEdit" value="{{$comment->comment}}{{$comment->id}}"></p>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger edit" value="{{$comment->id}}">Yes</button>
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">
                           <span class='glyphicon glyphicon-remove'></span> No
                       </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>