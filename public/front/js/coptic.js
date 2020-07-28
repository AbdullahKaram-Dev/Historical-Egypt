// Add comment


$(".submitComment").click(function(e) {



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

        url: '/coptic/post/comment',

        data: { comment: comment, post_id: post_id },

        success: function(data) {



            $(".bt").html(data);



        }

    });

});


// delete comment

$(".btn-delete").click(function(e) {



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

        url: '/coptic/post/comment/delete',

        data: { comment_id: comment_id, post_id: post_id },

        success: function(data) {


            $(".bt").html(data);



        }

    });


});



// Add repalt
$(".submitReply").click(function(e) {

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

        url: '/coptic/post/reply',

        data: { reply: reply, comment: comment, post_id: post_id },

        success: function(data) {

            $(".bt").html(data);
        }

    });

});

// delete replay

// delete comment

$(".reply-delete").click(function(e) {



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

        url: '/coptic/post/replay/' + reply_id + '',

        data: { comment_id: comment_id },

        success: function(data) {


            $(".rep").html(data);



        }

    });


});
///////////////////////////////////////////////////


//Search
$('body').on('keyup', '#search-coptic', function () {

    var SearchCoptic = $(this).val();
    var token = "{{Session::token()}}";

    $.ajax({

        method: 'get',
        url: '/search/coptic',
        data: {_token: token, search: SearchCoptic},

        success: function (data) {


            if(data){

                $('.rowscoptic').html(data);
                $("#grid").pinterest_grid({
                    no_columns: 4,
                    padding_x: 10,
                    padding_y: 10,
                    margin_bottom: 50,
                    single_column_breakpoint: 991
                })
            }else{
                $('.rowscoptic').html('No Data Found');
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