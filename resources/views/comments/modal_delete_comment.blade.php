    <!-- Modal to delete a comment -->
    <div id="commentDeleteModal{{$comment->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                 	<div class="modal-body">
                 		<p>Are you sure you want to delete this comment?</p>
                    </div>
                    <div class="modal-footer">
	        			<button type="button" class="btn btn-danger delete" value="{{$comment->id}}" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">
                           <span class='glyphicon glyphicon-remove'></span> No
                       </button>
                    </div>
                </div>
            </div>
        </div>