<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Islamics\store;
use App\Http\Requests\BackEnd\Islamics\update;
use App\Models\Islamic;
use App\Models\Islamic_reply;
use App\Models\IslamicComment;
use Illuminate\Http\Request;
class Islamics extends BackEndController
{
    public function __construct(Islamic $model)
    {


        parent::__construct($model);
    }


    public function store(store $request)
    {

        $file = $request->file('img');

        $filename = time() . str_random('10') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $requestArray = ['img' => $filename] + $request->all();

        $create = $this->model->create($requestArray);
        if ($create) {

            alert()->success('Added Successfully', 'Add Post Successfully');
            return redirect()->route('islamics.index');

        }


    }

    public function update($id, update $request)
    {
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . str_random('10') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $requestArray = ['img' => $filename] + $request->all();
            $row = $this->model->findorfail($id);
            $update = $row->update($requestArray);
            if ($update) {

                alert()->success('Success Message', 'Updated Success');
                return redirect()->route('pharaonics.index');

            }

        } else {

            $row = $this->model->findorfail($id);
            $OldImage = $row->img;
            $requestArray = ['img' => $OldImage] + $request->all();
            $update = $row->update($requestArray);
            if ($update) {

                alert()->success('Success Message', 'Updated Success Post: ' . $row->id . ' With OLdImage');

                return redirect()->route('pharaonics.index');

            } else {

                alert()->error('Failed Message', 'Failed To Update Post: ' . $row->id);

                return redirect()->route('pharaonics.index');
            }
        }

    }


    public function comments($id)
    {

        $comments = IslamicComment::get()->where('post_id', '=', $id);
        $title = "Islamic Comments";

        return view('back-end.islamics.comments', compact('comments', 'title'));
    }


    public function deletecomment($id)
    {

        $comment = IslamicComment::findOrfail($id);
        $comment->delete();
        return redirect()->back();
    }


    public function deletereplay($id)
    {

        $replay = Islamic_reply::findOrfail($id);
        $replay->delete();
        return redirect()->back();
    }


    public function singlepost($id)
    {
        $title = "Single Post";
        $singlepost = Islamic::findOrFail($id);
        return view('back-end.islamics.post', compact('title', 'singlepost'));
    }


    public function search(Request $request){
        $routeName = 'islamics';
        $title = $request->search;
        $rows = Islamic::where('title', 'like', '%' . $title . '%')->get();
        return view('back-end.islamics.search' , compact('rows' , 'routeName'));
    }

}
