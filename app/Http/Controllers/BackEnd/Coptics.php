<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Coptics\store;
use App\Http\Requests\BackEnd\Coptics\update;
use App\Models\Coptic;
use App\Models\Coptic_reply;
use App\Models\CopticComment;
use Illuminate\Http\Request;

class Coptics extends BackEndController
{
    public function __construct(Coptic $model)
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
            return redirect()->route('coptics.index');

        }


    }

    public function update($id, update $request)
    {
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . str_random('10') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $requestArray = ['img' => $filename] + $request->all();

        }
     
      

            $row = $this->model->findorfail($id);
            $update = $row->update($requestArray);
            if ($update) {


                alert()->success('Success Message', 'Updated Success');
                return redirect()->route('pharaonics.index');

           

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

        $comments = CopticComment::get()->where('post_id', '=', $id);
        $title = "Coptic Comments";

        return view('back-end.coptics.comments', compact('comments', 'title'));
    }

    public function deletecomment($id)
    {

        $comment = CopticComment::findOrfail($id);
        $comment->delete();
        return redirect()->back();
    }

    public function deletereplay($id)
    {

        $replay = Coptic_reply::findOrfail($id);
        $replay->delete();
        return redirect()->back();
    }







    public function search(Request $request)
    {
        $routeName = 'coptics';
        $title = $request->search;
        $rows = Coptic::where('title', 'like', '%' . $title . '%')->get();
        return view('back-end.coptics.search', compact('rows', 'routeName'));
    }

    public function singlepost($id)
    {
        $title = "Single Post";
        $singlepost = Coptic::findOrFail($id);
        return view('back-end.coptics.post', compact('title', 'singlepost'));

    }

}

