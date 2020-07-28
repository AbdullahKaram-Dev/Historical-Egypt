$(".CommentPharaonic").click(function (e) {


    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var comment = $("#comment").val();
    var post_id = $("#post_id").attr('post_id');


    $.ajax({

        type: 'POST',

        url: '/Pharaonic/post/comment',

        data: {comment: comment, post_id: post_id},

        success: function (data) {


            $(".bt").html(data);


        }

    });

});


// delete comment

$(".deletePharaonic").click(function (e) {


    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-r"]').attr('content')
        }
    });

    var comment_id = $("#comment_id").attr('comment_id');
    var post_id = $("#post_id").attr('post_id');


    $.ajax({

        type: 'POST',

        url: '/Pharaonic/post/comment/delete',

        data: {comment_id: comment_id, post_id: post_id},

        success: function (data) {


            $(".bt").html(data);


        }

    });


});


// Add repalt
$(".ReplyPharaonic").click(function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var post_id = $("#post_id").attr('post_id');

    var comment = $(this).attr('comment_id');
    var reply = $('*[text="' + comment + '"]').val();

    $.ajax({

        type: 'POST',

        url: '/Pharaonic/post/reply',

        data: {reply: reply, comment: comment, post_id: post_id},

        success: function (data) {

            $(".bt").html(data);
        }

    });

});

// delete replay

// delete comment

$(".deletePharaonicReply").click(function (e) {


    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-r"]').attr('content')
        }
    });

    var reply_id = $(this).attr('reply_id');
    var comment_id = $(this).attr('comment_id');


    $.ajax({

        type: 'POST',

        url: '/Pharaonic/post/replay/' + reply_id + '',

        data: {comment_id: comment_id},

        success: function (data) {


            $(".rep").html(data);


        }

    });


});
//////////////////////////////


//Search
$('body').on('keyup', '#search-pharaonic', function () {

    var SearchPharaonic = $(this).val();
    var token = "{{Session::token()}}";

    $.ajax({

        method: 'get',
        url: '/search/pharaonic',
        data: {_token: token, search: SearchPharaonic},

        success: function (data) {


            if(data){

                $('.rowspharaonic').html(data);
                $("#grid").pinterest_grid({
                    no_columns: 4,
                    padding_x: 10,
                    padding_y: 10,
                    margin_bottom: 50,
                    single_column_breakpoint: 991
                })
            }else{
                $('.rowspharaonic').html('No Data Found');
                $("#grid").pinterest_grid({
                    no_columns: 1,
                    padding_x: 10,
                    padding_y: 10,
                    margin_bottom: 50,
                    single_column_breakpoint: 991
                })
            }

        }
    });
});
//End Search