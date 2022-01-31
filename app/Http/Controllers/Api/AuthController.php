<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BeasdController as BeasdController;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BeasdController
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Please validtae error',$validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['name'] = $user->name;
        $success['token'] = $user->createToken('poKJHTYGUHASknclmlpOIUGBqoja')->accessToken;
        return $this->sendResponse($success,'User register is true');
    }

    public function login(Request $request){

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $success['name'] = $user->name;
            return $this->sendResponse($success,'User login is success !');
        }
        return $this->sendError('Please chack yout authe',['error'=>'Unauthorised']);
    }
}
