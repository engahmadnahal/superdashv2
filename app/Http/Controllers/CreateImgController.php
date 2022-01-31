<?php

namespace App\Http\Controllers;

use App\Models\CreateImg;
use App\Models\PostUser;
use App\Models\Sites;
use Illuminate\Http\Request;

class CreateImgController extends Controller
{
    public function getPage(){
        $sites = Sites::where('user_id',session('logged'))->get();
        return view('pages.createimg')->with('sites',$sites);
    }

    public function editPage($id){
        $site = Sites::where('site_id',$id)->first();
        $settingSite = CreateImg::where('user_id',session('logged'))->where('site_id',$id)->first();
        $isEmpty = $settingSite == null;
        return view('pages.editimgsite')->with('site',$site)->with('setting',$settingSite)->with('isEmpty',$isEmpty)->with('id',$id);
    }

    public function sendData(Request $request,$id){
        $request->validate([
            'stng_logo_one_top'=>'required',
            'stng_logo_two_top'=>'required',
            'stng_name_one_top'=>'required',
            'stng_name_two_top'=>'required',
            'stng_logo_one_right'=>'required',
            'stng_logo_two_right'=>'required',
            'stng_name_one_right'=>'required',
            'stng_name_two_right'=>'required',
            'stng_name_one_color'=>'required',
            'stng_name_two_color'=>'required',
            'stng_name_one_backg_color'=>'required',
            'stng_name_two_backg_color'=>'required',
            'backg_img'=>'required'
        ]);

        // Push data in array name one
        $stng_name_one = [
            'top'=>$request->stng_name_one_top,
            'left'=>$request->stng_name_one_right,
            'color'=>$request->stng_name_one_color,
            'backg'=>$request->stng_name_one_backg_color
        ];
        // Push data in array name two
        $stng_name_two = [
            'top'=>$request->stng_name_two_top,
            'left'=>$request->stng_name_two_right,
            'color'=>$request->stng_name_two_color,
            'backg'=>$request->stng_name_two_backg_color,
        ];
        // Push data in array logo one
        $stng_logo_one = [
            'top'=>$request->stng_logo_one_top,
            'left'=>$request->stng_logo_one_right
        ];
        // Push data in array logo two
        $stng_logo_two = [
            'top'=>$request->stng_logo_two_top,
            'left'=>$request->stng_logo_two_right
        ];
        $setting = CreateImg::create([
            'user_id'=>session('logged'),
            'site_id'=>$id,
            'backg_img'=>$request->backg_img,
            'stng_log_one'=>json_encode($stng_logo_one),
            'stng_logo_two'=>json_encode($stng_logo_two),
            'stng_name_one'=>json_encode($stng_name_one),
            'stng_name_two'=>json_encode($stng_name_two),
        ]);
        return redirect()->route('pages.createimg')->with('msgSuccess','تم حفظ الاعدادات بنجاح .');
    }

    public function updateData(Request $request , $id){

        $request->validate([
            'stng_logo_one_top'=>'required',
            'stng_logo_two_top'=>'required',
            'stng_name_one_top'=>'required',
            'stng_name_two_top'=>'required',
            'stng_logo_one_right'=>'required',
            'stng_logo_two_right'=>'required',
            'stng_name_one_right'=>'required',
            'stng_name_two_right'=>'required',
            'stng_name_one_color'=>'required',
            'stng_name_two_color'=>'required',
            'stng_name_one_backg_color'=>'required',
            'stng_name_two_backg_color'=>'required',
            'backg_img'=>'required'
        ]);

        // Push data in array name one
        $stng_name_one = [
            'top'=>$request->stng_name_one_top,
            'left'=>$request->stng_name_one_right,
            'color'=>$request->stng_name_one_color,
            'backg'=>$request->stng_name_one_backg_color
        ];
        // Push data in array name two
        $stng_name_two = [
            'top'=>$request->stng_name_two_top,
            'left'=>$request->stng_name_two_right,
            'color'=>$request->stng_name_two_color,
            'backg'=>$request->stng_name_two_backg_color,
        ];
        // Push data in array logo one
        $stng_logo_one = [
            'top'=>$request->stng_logo_one_top,
            'left'=>$request->stng_logo_one_right
        ];
        // Push data in array logo two
        $stng_logo_two = [
            'top'=>$request->stng_logo_two_top,
            'left'=>$request->stng_logo_two_right
        ];
        $settingUpdata = CreateImg::where('user_id',session('logged'))->where('site_id',$id)->first();

        $settingUpdata->update([
            'backg_img'=>$request->backg_img,
            'stng_log_one'=>json_encode($stng_logo_one),
            'stng_logo_two'=>json_encode($stng_logo_two),
            'stng_name_one'=>json_encode($stng_name_one),
            'stng_name_two'=>json_encode($stng_name_two),
        ]);

        return redirect()->route('pages.createimg')->with('msgSuccess','تم حفظ الاعدادات بنجاح .');

    }
    public function showPage($id){
        $imgMatch = PostUser::where('user_id',session('logged'))->get();
        $site = Sites::where('site_id',$id)->first();
        $settingSite = CreateImg::where('user_id',session('logged'))->where('site_id',$id)->first();
        $isEmpty = $settingSite == null;
        return view('pages.showimgsite')->with('match',$imgMatch)->with('site',$site)->with('setting',$settingSite)->with('isEmpty',$isEmpty);
    }
}
