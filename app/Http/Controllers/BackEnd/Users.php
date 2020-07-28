<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\store;
use App\Http\Requests\BackEnd\Users\update;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class Users extends BackEndController
{
    public function __construct(User $model){


        parent::__construct($model);
    }


    public function store(store $request)
    {


        if(request()->has('image')){

            $imageName = request('name').time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('UsersImage'), $imageName);
            $password = Hash::make($request['password']);

        $requestArray = ['image' => $imageName] + ['password' => $password] +$request->all();
        $create = $this->model->create($requestArray);
            if ($create) {

            alert()->success('Added Successfully', 'Add User Successfully');
            return redirect()->route('users.index');

        }
        }elseif(request('gender') == 'male'){

            $imageName = 'DefaultPhotoMale.png';
            $password = Hash::make($request['password']);
            $requestArray = ['image' => $imageName] + ['password' => $password] +$request->all();
            $create = $this->model->create($requestArray);
            if ($create) {

                alert()->success('Added Successfully', 'Add User Successfully');
                return redirect()->route('users.index');

            }
        }else{

            $imageName = 'DefaultPhotoFemale.png';
            $password = Hash::make($request['password']);
            $requestArray = ['image' => $imageName] + ['password' => $password] +$request->all();
            $create = $this->model->create($requestArray);
            if ($create) {

                alert()->success('Added Successfully', 'Add User Successfully');
                return redirect()->route('users.index');

            }
        }

    }








//        $file = $request->file('image');
//        $filename = time() . str_random('10') . '.' . $file->getClientOriginalExtension();
//        $file->move(public_path('UsersImage'), $filename);
//        $password = Hash::make($request['password']);
//
//        $requestArray = ['image' => $filename] + ['password' => $password] +$request->all();
//        $create = $this->model->create($requestArray);
//        if ($create) {
//
//            alert()->success('Added Successfully', 'Add User Successfully');
//            return redirect()->route('users.index');
//
//        }





    public function update($id , update $request){

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . str_random('10') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('UsersImage'), $filename);
            $requestArray = ['image' => $filename] + $request->all();
            $row = $this->model->findorfail($id);
            $update = $row->update($requestArray);
            if ($update) {


                alert()->success('Success Message', 'Updated Success');
                return redirect()->route('users.index');



            }
        } else {

            $row = $this->model->findorfail($id);
            $OldImage = $row->image;
            $requestArray = ['image' => $OldImage] + $request->all();
            $update = $row->update($requestArray);
            if ($update) {

                alert()->success('Success Message', 'Updated Success Post: ' . $row->id . ' With OLdImage');

                return redirect()->route('users.index');

            } else {

                alert()->error('Failed Message', 'Failed To Update Post: ' . $row->id);

                return redirect()->route('users.index');
            }
        }
//            $requestArray = $request->all();
//            $row = $this->model->findorfail($id);
//            $update =$row->update($requestArray);
//            if($update){
//
//                alert()->success('Updated Successfully', 'User Name: '. $row->name .' Updated Successfully');
//                return redirect()->route('users.index');
//
//            }
//            alert()->error('Field Updated','Cant Update User: '.$row->name);
//            return redirect()->route('users.index');

    }

    public function search(Request $request){
        $routeName = 'users';
        $name = $request->search;
        $rows = User::where('name', 'like', '%' . $name . '%')->get();
        return view('back-end.users.search' , compact('rows' , 'routeName'));
    }


}
