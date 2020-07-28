<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {


        $this->model = $model;

    }

    public function index()
    {

        $publarModel = $this->pluralModelName();
        $rows = $this->model;
        $rows = $this->fillter($rows);
        $rows = $rows->all();
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $title = $this->getModelName();


        return view('back-end.' . $publarModel . '.index', compact('rows', 'publarModel', 'routeName', 'title'));

    }


    public function create()
    {

        $publarModel = $this->pluralModelName();
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $title = $this->getModelName();

        return view('back-end.' . $publarModel . '.create', compact('routeName', 'title'));
    }


    public function edit($id)
    {
        $publarModel = $this->pluralModelName();
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $row = $this->model->findOrfail($id);

        $title = $this->getModelName();


        return view('back-end.' . $publarModel . '.edit', compact('row', 'routeName', 'title'));
    }


    public function destroy($id)
    {

        $this->model->findorfail($id)->delete();

        alert()->warning('Deleted', 'Deleted Successfully');
        return redirect()->back();

    }


    protected function getClassNameFromModel()
    {

        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName()
    {

        return str_plural($this->getModelName());
    }


    protected function getModelName()
    {

        return class_basename($this->model);

    }

    protected function fillter($rows)
    {

        return ($rows);
    }




}
