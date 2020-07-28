// preloder
$(document).ready(function() {
    $(".loader").delay(500).fadeOut();
});
//
$(document).ready(function() {

    //Coptic Like
    $(".likee").on('click', function() {
        // $(this).toggleClass("like");

        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);

        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function success(data) {

                if (data.is_like == 1) {

                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-default').addClass('btn-info');
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);

                    if (data.changelike == 1) {

                        var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_like);

                    }
                }

                if (data.is_like == 0) {

                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                }
            }
        });
    });

    $(".dislike").on('click', function() {
        // $(this).toggleClass("like");
        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);

        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: url_dislike,
            type: "POST",
            data: data,
            success: function success(data) {

                // document.getElementById("IDD").innerHTML="You And"

                // // alert(data.is_like);
                if (data.is_dislike == 1) {
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-default').addClass('btn-danger');
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);

                    if (data.changedislike == 1) {
                        var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                    }

                }
                if (data.is_dislike == 0) {

                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);
                }
            }
        });
    });
    //End Coptic Like


    //Islamic Like
    $(".likeee").on('click', function() {
        // $(this).toggleClass("like");
        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);
        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: urll,
            type: "POST",
            data: data,
            success: function success(data) {

                if (data.is_like == 1) {
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-default').addClass('btn-danger');
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);

                    if (data.changelike == 1) {

                        var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_like);

                    }

                }
                if (data.is_like == 0) {
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                }
                document.getElementById("islamic").innerHTML = "You And";
            }
        });
    });

    $(".dislikee").on('click', function() {

        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);

        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: urll_dislike,
            type: "POST",
            data: data,
            success: function success(data) {

                if (data.is_dislike == 1) {
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-default').addClass('btn-danger');
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);

                    if (data.changedislike == 1) {
                        var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                    }

                }

                if (data.is_dislike == 0) {
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);
                }
            }
        });
    });
    //End Islamic Like


    //Modern Like
    $(".likeeee").on('click', function() {
        // $(this).toggleClass("like");
        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);
        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: url_modern,
            type: "POST",
            data: data,
            success: function success(data) {

                if (data.is_like == 1) {
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-default').addClass('btn-danger');
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);

                    if (data.changelike == 1) {

                        var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_like);

                    }
                }
                if (data.is_like == 0) {
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                }
                document.getElementById("modern").innerHTML = "You And";
            }
        });
    });

    $(".dislikeee").on('click', function() {

        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);

        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: urll_modern,
            type: "POST",
            data: data,
            success: function success(data) {

                if (data.is_dislike == 1) {
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-default').addClass('btn-danger');
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);

                    if (data.changedislike == 1) {
                        var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                    }

                }
                if (data.is_dislike == 0) {
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);
                }
            }
        });
    });
    //End Modern Like


    // Like pharaonic
    $(".likeeeee").on('click', function() {
        // $(this).toggleClass("like");
        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);
        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: url_pharaonic,
            type: "POST",
            data: data,
            success: function success(data) {

                if (data.is_like == 1) {
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-default').addClass('btn-danger');
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);

                    if (data.changelike == 1) {

                        var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_like);

                    }
                }
                if (data.is_like == 0) {
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                }
            }
        });
    });

    $(".dislikeeee").on('click', function() {

        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-post_id');
        post_id = post_id.slice(0, -2);

        var data = { like_s: like_s, post_id: post_id, _token: token };

        $.ajax({
            url: urll_pharaonic,
            type: "POST",
            data: data,
            success: function success(data) {

                if (data.is_dislike == 1) {
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-default').addClass('btn-danger');
                    $('*[data-post_id="' + post_id + '_l"]').removeClass('btn-danger').addClass('btn-default');

                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) + 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);

                    if (data.changedislike == 1) {
                        var cu_like = $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-post_id="' + post_id + '_l"]').find('.like_count').text(new_like);
                    }
                }
                if (data.is_dislike == 0) {
                    $('*[data-post_id="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-default');
                    var cu_like = $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_like) - 1;
                    $('*[data-post_id="' + post_id + '_d"]').find('.dislike_count').text(new_dislike);
                }
            }
        });
    });
    //End pharaonic Like

});
