<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }

    public function saveDataUser(Request $request ){
     // validate data form
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|max:15'
        ]);
        $fullName = $request->fname . " " . $request->lname;

        $user = User::create([
             'name'=>$fullName,
             'email'=>$request->email,
             'password'=>Hash::make($request->password),
             'type'=>'user',
             'is_active'=>'0'
         ]);


        return redirect()->route('pages.index')->with('msg','سجل دخولك يا عزيزي !');

    }

    public function logged(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:6|max:15'
        ]);

        $userInfo = User::where("email","=",$request->email)->first();
        if(!$userInfo){
            return redirect()->route('auth.login')->with('msg',"انت غير مسجل يا عزيزي !");

        }else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('logged',$userInfo->user_id);
                return redirect()->route('pages.index')->with('msg','Welcome Mr.'.$userInfo->name);
            }else{
                return redirect()->route('auth.login')->with('msg',"كلمة المرور غير صحيحة !");
            }
        }
    }
}
