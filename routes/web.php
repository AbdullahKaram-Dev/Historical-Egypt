<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// strat routes dashboard
Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function () {

    Route::get('/home', 'home@index')->name('admin');
    //start route all categories

    Route::resource('pharaonics', 'Pharaonics')->except(['show', 'delete']);
    Route::resource('coptics', 'Coptics')->except(['show', 'delete']);
    Route::resource('islamics', 'Islamics')->except(['show', 'delete']);
    Route::resource('moderns', 'Moderns')->except(['show', 'delete']);
    Route::resource('homepages', 'Homepages')->except(['show', 'delete']);
    Route::resource('sliders', 'Sliders')->except(['show', 'delete']);
    Route::resource('users', 'Users')->middleware('owner');
    //end route all categories

    Route::get('/contact-us', 'home@ContactUs')->name('contactuss')->middleware('owner');
    Route::get('/contact-us/message/{id?}', 'home@MessageContactUs')->name('MessageContactUs')->middleware('owner');
    Route::delete('/contact-us/message/{id?}', 'home@MessageDelete')->name('MessageDelete');

    //start route for login
    Route::get('login', 'Login@index')->name('login');
    //end route for login

    //start route for select and delete comments and replay in all categories in dashboard //

    //pharaonic
    Route::get('pharaonics/comments/{id?}', 'Pharaonics@comments')->name('pharaonic.comments');
    Route::delete('pharaonics/comments/delete/{id?}', 'Pharaonics@deletecomment')->name('delete.comment.pharaonic');
    Route::delete('pharaonics/replay/delete/{id?}', 'Pharaonics@deletereplay')->name('delete.replay.pharaonic');
    //end pharaonic

    //modern
    Route::get('moderns/comments/{id?}', 'Moderns@comments')->name('modern.comments');
    Route::delete('moderns/comments/delete/{id?}', 'Moderns@deletecomment')->name('delete.comment.modern');
    Route::delete('moderns/replay/delete/{id?}', 'Moderns@deletereplay')->name('delete.replay.modern');
    //end modern

    //islamic
    Route::get('islamics/comments/{id?}', 'Islamics@comments')->name('islamic.comments');
    Route::delete('islamics/comments/delete/{id?}', 'Islamics@deletecomment')->name('delete.comment.islamic');
    Route::delete('islamics/replay/delete/{id?}', 'Islamics@deletereplay')->name('delete.replay.islamic');
    //end islamic

    //coptic
    Route::get('coptics/comments/{id?}', 'Coptics@comments')->name('coptic.comments');
    Route::delete('coptics/comments/delete/{id?}', 'Coptics@deletecomment')->name('delete.comment.coptic');
    Route::delete('coptics/replay/delete/{id?}', 'Coptics@deletereplay')->name('delete.replay.coptic');
    //end coptic

    //end route for select and delete comments and replay in all categories in dashboard //

    //Route for Single Post in All Categories
    Route::get('/coptics/single-post/{id?}', 'Coptics@singlepost')->name('singlepost');
    Route::get('/islamics/single-post/{id?}', 'Islamics@singlepost')->name('singlepost.islamic');
    Route::get('/moderns/single-post/{id?}', 'Moderns@singlepost')->name('singlepost.Moderns');
    Route::get('/pharaonics/single-post/{id?}', 'Pharaonics@singlepost')->name('singlepost.Pharaonics');

    //End route for single post in all Categories

    // Search In All Categories
    Route::get('/search', 'Coptics@search')->name('search');
    Route::get('/search/islamic', 'Islamics@search')->name('search-islamic');
    Route::get('/search/modern', 'Moderns@search')->name('search-modern');
    Route::get('/search/pharaonic', 'Pharaonics@search')->name('search-pharaonic');
    Route::get('/search/users', 'Users@search')->name('search-users');
    //End Search In All Categories
});
//end route dashboard



Auth::routes(['verify'=>true]);


Route::get('/', 'FrontEnd\FrontEndController@index');

Route::get('/coptic', 'FrontEnd\FrontEndController@coptic');
Route::get('/coptic/post/{id}', 'FrontEnd\FrontEndController@CopticPost')->name('coptic_post');

Route::get('/islamic', 'FrontEnd\FrontEndController@islamic');
Route::get('/islamic/post/{id}', 'FrontEnd\FrontEndController@islamicPost')->name('islamic_post');

Route::get('/modern', 'FrontEnd\FrontEndController@modern');
Route::get('/modern/post/{id}', 'FrontEnd\FrontEndController@modernPost')->name('modern_post');

Route::get('/pharaonic', 'FrontEnd\FrontEndController@pharaonic');
Route::get('/pharaonic/post/{id}', 'FrontEnd\FrontEndController@pharaonicPost')->name('pharaonic_post');


/*Start Route Comment*/

Route::group(['namespace' => 'FrontEnd'], function () {

    Route::post('/Pharaonic/post/comment', 'PharaonicCommentReply@AddComment');
    Route::post('/Pharaonic/post/comment/delete', 'PharaonicCommentReply@deletecomment');
    Route::post('/Pharaonic/post/reply', 'PharaonicCommentReply@AddReply');
    Route::post('/Pharaonic/post/replay/{id?}', 'PharaonicCommentReply@deletereplay')->name('replay.pharaonic.delete');


    Route::post('/Modern/post/comment', 'ModernCommentReply@AddComment');
    Route::post('/Modern/post/comment/delete', 'ModernCommentReply@deletecomment');
    Route::post('/Modern/post/reply', 'ModernCommentReply@AddReply');
    Route::post('/Modern/post/replay/{id?}', 'ModernCommentReply@deletereplay')->name('replay.modern.delete');

    Route::post('/coptic/post/comment', 'CopticCommentReply@AddComment');
    Route::post('/coptic/post/comment/delete', 'CopticCommentReply@deletecomment');
    Route::post('/coptic/post/reply', 'CopticCommentReply@AddReply');
    Route::post('/coptic/post/replay/{id?}', 'CopticCommentReply@deletereplay')->name('replay.coptic.delete');


    Route::post('/islamic/post/comment', 'IslamicCommentReply@AddComment');
    Route::post('/islamic/post/comment/delete', 'IslamicCommentReply@deletecomment');
    Route::post('/islamic/post/reply', 'IslamicCommentReply@AddReply');
    Route::post('/islamic/post/replay/{id?}', 'IslamicCommentReply@deletereplay')->name('replay.islamic.delete');

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////





//Start Like Route

    Route::post('/pharaonic/like', 'PharaonicCommentReply@AddLike')->name('likee.pharaonic');
    Route::post('/pharaonic/dislike', 'PharaonicCommentReply@AddDislike')->name('dislike.pharaonic');

    Route::post('/modern/like', 'ModernCommentReply@AddLike')->name('likee.modern');
    Route::post('/modern/dislike', 'ModernCommentReply@AddDislike')->name('dislike.modern');

    Route::post('/coptic/like', 'CopticCommentReply@AddLike')->name('like.add');
    Route::post('/coptic/dislike', 'CopticCommentReply@AddDislike')->name('dislike.add');

    Route::post('/islamic/like', 'IslamicCommentReply@AddLike')->name('likee.islamic');
    Route::post('/islamic/dislike', 'IslamicCommentReply@AddDislike')->name('dislike.islamic');
//End Like Route

    //Start Route Search In All Categories
    Route::get('/search/coptic', 'FrontEndController@CopticSearch');
    Route::get('/search/islamic', 'FrontEndController@IslamicSearch');
    Route::get('/search/modern', 'FrontEndController@ModernSearch');
    Route::get('/search/pharaonic', 'FrontEndController@PharaonicSearch');
    //End Route Search in All Categories


    //contact Us Route
    Route::get('/contact-us', 'FrontEndController@ContactUsShow')->name('Show.contactus');
    Route::post('/contact-us', 'FrontEndController@contactus')->name('create.contactus');
    //End Contact Us
});

/*End Route Comment*/







