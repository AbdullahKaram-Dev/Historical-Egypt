<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Coptic_reply;
use App\Models\CopticComment;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Replies;
use App\Models\Coptic;
use App\Models\CopticLike;
use Illuminate\Http\Request;


class CopticCommentReply extends Controller
{
    /**
     * @param $id
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\Support\MessageBag
     */
    public function AddComment(Request $request)
    {

        $RequestData = [
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment];

        $CreateComment = CopticComment::create($RequestData);

        if ($CreateComment) {


            $rows = Coptic::where('id', '=', $request->post_id)->with('comments')->first();


            return view('front-end.coptics.comment', compact('rows'));

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


        $AddReply = Coptic_reply::create($data);

        if ($AddReply) {

            $rows = Coptic::where('id', '=', $request->post_id)->with('comments')->first();


            return view('front-end.coptics.comment', compact('rows'));

        }

    }

    public function deletecomment(Request $request)
    {


        $comment = CopticComment::findOrfail($request->comment_id);


        $comment->delete();


        $rows = Coptic::where('id', '=', $request->post_id)->with('comments')->first();


        return view('front-end.coptics.comment', compact('rows'));


        // $comment->delete();
        // return redirect()->back();
    }

    public function deletereplay($id, Request $request)
    {
        $Coptic_reply = Coptic_reply::findOrfail($id);
        $Coptic_reply->delete();
        $replies = Coptic_reply::where('comment_id', $request->comment_id)->get();
        $comment = CopticComment::where('id', '=', $request->comment_id)->first();

        return view('front-end.coptics.reply', compact('replies', 'comment'));
    }

    /**
     * @param Request $request
     *
     */

    public function AddLike(Request $request)
    {

        $post_id = $request->post_id;
        $changelike = 0;

        $like = CopticLike::where('post_id', $post_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$like) {
            $new_like = new CopticLike;
            $new_like->post_id = $post_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 1;
            $new_like->save();
            $is_like = 1;
        } elseif ($like->like == 1) {
            CopticLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->delete();
            $is_like = 0;
        } elseif ($like->like == 0) {
            CopticLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->update(['like' => 1]);
            $changelike = 1;
            $is_like = 1;
        }

        $response = array(
            'changelike' => $changelike,
            'is_like' => $is_like,
        );
        return response()->json($response, 200);
    }

    public function AddDislike(Request $request)
    {

        $post_id = $request->post_id;
        $changedislike = 0;
        $dislike = CopticLike::where('post_id', $post_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$dislike) {
            $new_like = new CopticLike;
            $new_like->post_id = $post_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 0;
            $new_like->save();
            $is_dislike = 1;
        } elseif ($dislike->like == 0) {
            CopticLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->delete();
            $is_dislike = 0;
        } elseif ($dislike->like == 1) {
            CopticLike::where('post_id', $post_id)->where('user_id', auth()->user()->id)->update(['like' => 0]);
            $is_dislike = 1;
            $changedislike = 1;
        }

        $response = array(
            'changedislike' => $changedislike,
            'is_dislike' => $is_dislike,
        );
        return response()->json($response, 200);
    }

}
