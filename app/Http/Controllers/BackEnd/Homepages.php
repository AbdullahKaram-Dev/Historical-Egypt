<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Http\Requests\BackEnd\Homepages\store;
use App\Http\Requests\BackEnd\Homepages\update;


class Homepages extends BackEndController
{
    public function __construct(Homepage $model)
    {


        parent::__construct($model);
    }


    public function store(store $request)
    {

        $requestArray = $request->all();
        $create = $this->model->create($requestArray);
        if ($create) {

            alert()->success('Success Message', 'The HomePage Created Successfully');

            return redirect()->route('homepages.index');
        } else {

            alert()->error('Failed Message', 'Failed To Create HomePage');

            return redirect()->route('homepages.index');
        }


    }

    public function update($id, update $request)
    {
        $requestArray = $request->all();

        $row = $this->model->findorfail($id);
        $update = $row->update($requestArray);
        if ($update) {

            alert()->success('Success Message', 'The HomePage Updated Successfully');
            return redirect()->route('homepages.index');
        } else {

            alert()->error('Failed Message', 'Failed To Update The HomePage');
            return redirect()->route('homepages.index');
        }

    }
}
