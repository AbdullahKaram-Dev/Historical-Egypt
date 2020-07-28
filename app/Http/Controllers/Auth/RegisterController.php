<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{


    use RegistersUsers;

    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'group' => ['required', 'string'],
            'image' => ['image','max:3000'],
            'gender'=>['required','in:male,female'],
        ]);
    }

    protected function create(array $data)
    {


        if(request()->has('image')){

            $imageName = request('name').time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('UsersImage'), $imageName);

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'group' => $data['group'],
                'image' => $imageName,
                'gender'=>$data['gender']
            ]);

        }elseif(request('gender') == 'male'){

            $imageName = 'DefaultPhotoMale.png';

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'group' => $data['group'],
                'image' => $imageName,
                'gender'=>$data['gender']

            ]);

        }else{

            $imageName = 'DefaultPhotoFemale.png';

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'group' => $data['group'],
                'image' => $imageName,
                'gender'=>$data['gender']

            ]);

        }

    }
}
