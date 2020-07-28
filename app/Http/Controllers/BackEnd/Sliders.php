<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Sliders\store;
use App\Http\Requests\BackEnd\Sliders\update;
use App\Models\Slider;

class Sliders extends BackEndController
{
    public function __construct(Slider $model)
    {


        parent::__construct($model);
    }


    public function store(store $request)
    {

        $file = $request->file('img');

        $filename = time() . str_random('10') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Sliders'), $filename);
        $requestArray = ['img' => $filename] + $request->all();

        $create = $this->model->create($requestArray);
        if ($create) {

            alert()->success('Added Successfully', 'Add Slider Successfully');
            return redirect()->route('sliders.index');

        }

    }

    public function update($id, update $request)
    {

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . str_random('10') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('Sliders'), $filename);
            $requestArray = ['img' => $filename] + $request->all();
            $row = $this->model->findorfail($id);
            $update = $row->update($requestArray);
            if ($update) {

                alert()->success('Success Message', 'Updated Success');
                return redirect()->route('sliders.index');

            }

        } else {

            $row = $this->model->findorfail($id);
            $OldImage = $row->img;
            $requestArray = ['img' => $OldImage] + $request->all();

            $update = $row->update($requestArray);
            if ($update) {

                alert()->success('Success Message', 'Updated Success Post: ' .$row->id. ' With OLdImage');

                return redirect()->route('sliders.index');

            }else{

                alert()->error('Failed Message', 'Failed To Update Post: ' .$row->id);

                return redirect()->route('sliders.index');
            }
        }

    }
}
