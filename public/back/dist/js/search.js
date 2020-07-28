$('body').on('keyup', '#searchh', function () {

    var search = $(this).val();
    var token = "{{Session::token()}}";

    $.ajax({

        method: 'get',
        url: '/admin/search',
        data: {_token: token, search: search},

        success: function (data) {
                $('.rows').html(data);
        }
    });
});

$('body').on('keyup', '#search-islamic', function () {

    var SearchIslamic = $(this).val();
    var token = "{{Session::token()}}";

    $.ajax({

        method: 'get',
        url: '/admin/search/islamic',
        data: {_token: token, search: SearchIslamic},

        success: function (data) {


            $('.rowsislamic').html(data);

        }
    });
});

$('body').on('keyup', '#search-modern', function () {

    var SearchModern = $(this).val();
    var token = "{{Session::token()}}";

    $.ajax({

        method: 'get',
        url: '/admin/search/modern',
        data: {_token: token, search: SearchModern},

        success: function (data) {


            $('.rowsmodern').html(data);

        }
    });
});

$('body').on('keyup', '#search-pharaonic', function () {

    var SearchPharaonic = $(this).val();
    var token = "{{Session::token()}}";

    $.ajax({

        method: 'get',
        url: '/admin/search/pharaonic',
        data: {_token: token, search: SearchPharaonic},

        success: function (data) {

            $('.rowspharaonic').html(data);
        }
    });
});

$('body').on('keyup', '#search-users', function () {

    var SearchUsers = $(this).val();
    var token = "{{Session::token()}}";

    $.ajax({

        method: 'get',
        url: '/admin/search/users',
        data: {_token: token, search: SearchUsers},

        success: function (data) {

            $('.rowsusers').html(data);
        }
    });
});