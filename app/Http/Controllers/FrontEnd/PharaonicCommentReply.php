<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Pharaonic_reply;
use App\Models\PharaonicComment;
use App\Http\Requests\BackEnd\Replies;
use App\Models\Pharaonic;
use App\Models\PharaonicLike;
use Illuminate\Http\Request;


class PharaonicCommentReply extends Controller
{
    public function AddComment(Request $request)
    {

        $RequestData = [
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment];

        $CreateComment = PharaonicComment::create($RequestData);

        if ($CreateComment) {


            $rows = Pharaonic::where('id', '=',  $request->post_id)->with('comments')->first();


            return view('front-end.pharaonics.comment', compact('rows'));

        } elseif (validator()->fails()) {

            return validator()->errors();
        }

    }

    public function AddReply(Request $request)
    {

        $data = [
            'reply' => $request->reply,

            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,

           'comment_id' => $request->comment,
            ];

            
            
      

        $AddReply = Pharaonic_reply::create($data);

        if ($AddReply) {

            $rows = Pharaonic::where('id', '=',  $request->post_id)->with('comments')->first();


            return view('front-end.pharaonics.comment', compact('rows'));

        }

    }

    public function deletecomment(Request $request)
    {
        $comment = PharaonicComment::findOrfail($request->comment_id);


        $comment->delete();


            $rows = Pharaonic::where('id', '=',  $request->post_id)->with('comments')->first();


            return view('front-end.pharaonics.comment', compact('rows'));


    }

    public function deletereplay($id ,Request $request)
    {

        $Coptic_reply = Pharaonic_reply::findOrfail($id);
        $Coptic_reply->delete();
        $replies = Pharaonic_reply::where('comment_id',$request->comment_id)->get();
        $comment = PharaonicComment::where('id', '=',  $request->comment_id)->first();

        return view('front-end.pharaonics.reply', compact('replies','comment'));
    }

    public function AddLike(Request $request)
    {
        $changelike = 0;
        $post_id = $request->post_id;

        $like = PharaonicLike::where('post_id', $post_id)
            ->where('user_id', auth()->user()->id)
            ->first();
        if (!$like) {
            $new_like = new PharaonicLike;
            $new_like->post_id = $post_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 1;
            $new_like->save();
            $is_like = 1;
        } elseif ($like->like == 1) {
            PharaonicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->delete();
            $is_like = 0;
        } elseif ($like->like == 0) {
            PharaonicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)
                ->update(['like' => 1] );
            $is_like = 1;
            $changelike = 1;

        }

        $response = array(
            'changelike' => $changelike,
            'is_like' => $is_like
        );
        return response()->json($response, 200);
    }

    public function AddDislike(Request $request)
    {

        $post_id = $request->post_id;
        $changedislike = 0;

        $dislike = PharaonicLike::where('post_id', $post_id)
            ->where('user_id', auth()->user()->id)
            ->first();
        if (!$dislike) {
            $new_like = new PharaonicLike;
            $new_like->post_id = $post_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 0;
            $new_like->save();
            $is_dislike = 1;
        } elseif ($dislike->like == 0) {
            PharaonicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->delete();
            $is_dislike = 0;
        } elseif ($dislike->like == 1) {

            PharaonicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->update(['like'=> 0]);
            $is_dislike = 1;
            $changedislike = 1;

        }

        $response = array(
            'changedislike' =>$changedislike,
            'is_dislike' => $is_dislike,
        );
        return response()->json($response, 200);
    }
}
