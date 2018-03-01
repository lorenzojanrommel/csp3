    <!-- Modal form to create a post -->
    <div id="createModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Post </h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="{{action('PostsController@store')}}" method="POST" enctype="multipart/form-data" class="createNewPost">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    {{-- @csrf --}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="title">Post Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control post-title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="body">Post Content</label>
                            <div class="col-sm-12">
                                <textarea class="form-control bodyContent" id="article-ckeditor" name="body" rows="3"></textarea>
                                {{-- <textarea class="form-control" name="body" rows="3"></textarea> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="file" name="cover_image" class="cover_image">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-info">Save</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>