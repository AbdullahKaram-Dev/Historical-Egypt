<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Islamic_reply;
use App\Models\IslamicComment;
use App\Http\Requests\BackEnd\Comments\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Replies;
use App\Models\Islamic;
use App\Models\IslamicLike;
use Illuminate\Http\Request;


class IslamicCommentReply extends Controller
{
    public function AddComment(Request $request)
    {

        $RequestData = [
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment];

        $CreateComment = IslamicComment::create($RequestData);

        if ($CreateComment) {


            $rows = Islamic::where('id', '=',  $request->post_id)->with('comments')->first();


            return view('front-end.islamics.comment', compact('rows'));

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


        $AddReply = Islamic_reply::create($data);

        if ($AddReply) {

            $rows = Islamic::where('id', '=',  $request->post_id)->with('comments')->first();


            return view('front-end.islamics.comment', compact('rows'));

        }

    }

    public function deletecomment(Request $request)
    {
        $comment = IslamicComment::findOrfail($request->comment_id);


        $comment->delete();


            $rows = Islamic::where('id', '=',  $request->post_id)->with('comments')->first();


            return view('front-end.islamics.comment', compact('rows'));


    }

    public function deletereplay($id ,Request $request)
    {

        $Coptic_reply = Islamic_reply::findOrfail($id);
        $Coptic_reply->delete();
        $replies = Islamic_reply::where('comment_id',$request->comment_id)->get();
        $comment = IslamicComment::where('id', '=',  $request->comment_id)->first();

        return view('front-end.islamics.reply', compact('replies','comment'));
    }

    public function AddLike(Request $request)
    {
        $changelike = 0;
        $post_id = $request->post_id;
        $like = IslamicLike::where('post_id', $post_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$like) {
            $new_like = new IslamicLike;
            $new_like->post_id = $post_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 1;
            $new_like->save();
            $is_like = 1;
        } elseif ($like->like == 1) {
            IslamicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->delete();
            $is_like = 0;
        } elseif ($like->like == 0) {
            IslamicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->update(['like'=> 1]);
            $is_like = 1;
            $changelike = 1;
        }

        $response = array(
            'changelike' => $changelike,
            'is_like' => $is_like,
        );
        return response()->json($response, 200);
    }

    public function AddDislike(Request $request)
    {
        $changedislike = 0;
        $post_id = $request->post_id;

        $dislike = IslamicLike::where('post_id', $post_id)
            ->where('user_id', auth()->user()->id)
            ->first();
        if (!$dislike) {
            $new_like = new IslamicLike;
            $new_like->post_id = $post_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 0;
            $new_like->save();
            $is_dislike = 1;
        } elseif ($dislike->like == 0) {
            IslamicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->delete();
            $is_dislike = 0;
        } elseif ($dislike->like == 1) {
            IslamicLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->update(['like'=> 0]);
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
