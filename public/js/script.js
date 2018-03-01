// $('.navbar').hide();
// // nav show when scroll down
// $(window).scroll(function(){
//     if ($(this).scrollTop() > 100) {
//         $('.navbar').fadeIn();
//     }else{
//         $('.navbar').css('opacity', '0.8');
//         $('.navbar').fadeOut('fast');
//     }
// })
// ajax setup
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // add comment
        $('body').on('submit', '.addComment', function(event){
            event.preventDefault();
            var method = $(this).attr('method');
            var url = $(this).attr('action');
            var comment = $(this).serialize();
            $.ajax({
                method : method,
                url: url,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : comment,
                success: function(data, response){
                    $('.refresh').load(location.href + " .refresh");
                }
            });
        })
    // delete comment
    $('body').on('click', '.delete', function(e){
        var id = $(this).val();
        // console.log(id);
            $.ajax({
            method: 'POST',
            url: '/delete-comment/'+id,
            data: id,
            success: function(data, response){
                $('.refresh').load(location.href + " .refresh");
            }
        })
    })

    // Edit comment
    // $('body').on('click', '.edit', function(e){
    //     var id = $(this).val();
    //     var comment = $('.commentToEdit').val();
    //     console.log(id);
    //     console.log(comment);
    // })

    // delete user
    $('body').on('click', '.delete-user', function(e){
        var id = $(this).val();
        // console.log(id);
            $.ajax({
            method: 'POST',
            url: 'delete-user/'+id,
            data: id,
            success: function(data, response){
                $('.user-list-refresh').load(location.href + ' .user-list-refresh');
            }
        })
    })
    // add user
    $('body').on('submit', '.add-user-admin', function(e){
        e.preventDefault();
        var method = $(this).attr('method');
        var url = $(this).attr('action');
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        $('#addAdmin').modal('toggle');
        // console.log(method);
        $.ajax({
            method : method,
            url : url,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                name : name,
                email : email,
                password : password
            },
            success: function(data){
                $('.user-list-refresh').load(location.href + ' .user-list-refresh');
            }
        })
    })
    // edit user
    $('body').on('click', '.editme', function(event){
        event.preventDefault();
        var method = $('.edit-user-via-admin').attr('method');
        var url = $('.edit-user-via-admin').attr('action');
        var id = $(this).data('id');
        var name = $( '#edit-name'+id).val();
        var email = $( '#edit-email'+id).val();
        var role = $( '#edit-role'+id).val();
        var status = $( '#edit-status'+id).val();
        $('#editUser'+id).modal('toggle');
        $.ajax({
            method : method,
            url : url+'/'+id,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                name : name,
                email : email,
                role : role,
                status : status
            },
            success: function(data){
                $('.user-list-refresh').load(location.href + ' .user-list-refresh');
            }
        })
    })
    //Add post
    // $('body').on('submit', '.createNewPost', function(e){
    //     e.preventDefault();
    //     var method = $(this).attr('method');
    //     var url = $(this).attr('action');
    //     var title = $('.post-title').val();
    //     var body = $('.bodyContent').val();
    //     var cover_image = $('.cover_image').val();
    //     $('#createModal').modal('toggle');
    //     $.ajax({
    //         method : method,
    //         url : url,
    //         data : {
    //             title : title,
    //             body : body,
    //             cover_image : cover_image
    //         },
    //         success : function(data){
    //             console.log(data);
    //             $('.post-title').val('');
    //             // $('textarea').val('');
    //             CKEDITOR.instances['.bodyContent'].setData('');
    //             $('.cover_image').val('');
    //             $('.profile-to-refresh').load(location.href + ' .profile-to-refresh');
    //         }
    //     })
    // })
    // Delete post 
    $('body').on('click', '.deletePost', function(e){
        var id = $(this).data('id');
        // console.log(id);
            $.ajax({
            method: 'DELETE',
            url: 'posts/'+id,
            data: id,
            success: function(data, response){
                $('.to-refresh').load(location.href + ' .to-refresh');
                // $('.refresh').load(location.href + " .refresh");
                
            }
        })
    })
    new WOW().init();