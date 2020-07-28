<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Pharaonics\store;
use App\Http\Requests\BackEnd\Pharaonics\update;
use App\Models\Pharaonic;
use App\Models\Pharaonic_reply;
use App\Models\PharaonicComment;
use Illuminate\Http\Request;


class Pharaonics extends BackEndController
{


    public function __construct(Pharaonic $model)
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

            return redirect()->route('pharaonics.index');
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

                alert()->success('Success Message', 'Updated Success Post: ' .$row->id. ' With OLdImage');

                return redirect()->route('pharaonics.index');

            }else{

                alert()->error('Failed Message', 'Failed To Update Post: ' .$row->id);

                return redirect()->route('pharaonics.index');
            }
        }
    }

    public function comments($id)
    {

        $comments = PharaonicComment::get()->where('post_id', '=', $id);
        $title = "Pharaonic Comments";

        return view('back-end.pharaonics.comments', compact('comments', 'title'));
    }


    public function deletecomment($id)
    {

        $comment = PharaonicComment::findOrfail($id);
        $comment->delete();
        return redirect()->back();
    }


    public function deletereplay($id)
    {

        $replay = Pharaonic_reply::findOrfail($id);
        $replay->delete();
        return redirect()->back();
    }


    public function singlepost($id)
    {
        $title = "Single Post";

        $singlepost = Pharaonic::findOrFail($id);
              return view('back-end.pharaonics.post' , compact('title' , 'singlepost'));


    }


    public function search(Request $request){
        $routeName = 'pharaonics';
        $title = $request->search;
        $rows = Pharaonic::where('title', 'like', '%' . $title . '%')->get();

        return view('back-end.pharaonics.search' , compact('rows' , 'routeName'));
    }


}

