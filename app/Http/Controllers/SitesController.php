<?php

namespace App\Http\Controllers;

use App\Models\CreateImg;
use App\Models\Post;
use App\Models\Sites;
use App\Models\User;
use Illuminate\Http\Request;

class SitesController extends Controller
{

    public function showSites(){
        $typeUser = User::where('user_id','=',session('logged'))->first()->type;
        global $sites;
        if($typeUser == "admin"){
            $sites = Sites::all();
            }
        $sites = Sites::where('user_id','=',session('logged'))->get();
        return view('welcome')->with('sites',$sites);
    }

    public function AddSitePage(){

        return view('pages.addsite');
    }


    public function EditSitePage($id){
        $dataSite = Sites::where('site_id','=',$id)->first();
        return view('pages.editsite')->with('dataSite',$dataSite);
    }

    public function showOptionSite($id){
        $infoSite = Sites::where('site_id','=',$id)->first();
        return view('pages.showdatasite')->with('infoSite',$infoSite)->with('id',$id);
    }

    public function setNewSite(Request $request){

        $request->validate([
            'name_site'=>'required',
            'url_site'=>'required',
            'post_site'=>'required',
            'table_site'=>'required'
        ]);

        $addNewSite = Sites::create([
            'user_id'=>session('logged'),
            'name_site'=>$request->name_site,
            'url_site'=>$request->url_site,
            'post_site'=>$request->post_site,
            'table'=>$request->table_site,

        ]);



        return redirect()->route('pages.index')->with('msgSuccess','تم اضافة الموقع بنجاح');
    }

    public function updateSite(Request  $request,$id){
        $site = Sites::where('site_id','=',$id);
        $request->validate([
            'name_site'=>'required',
            'url_site'=>'required',
            'post_site'=>'required',
            'table_site'=>'required'
        ]);

        $site->update([
            'name_site' => $request->name_site,
            'url_site'=>$request->url_site,
            'post_site'=>$request->post_site,
            'table'=>$request->table_site
        ]);


        return redirect()->route('pages.index')->with('msgSuccess','تم تحديث الموقع بنجاح');
    }

    public function deleteSite($id){
        $site = Sites::where('site_id','=',$id);
        $site->delete();
        return redirect()->route('pages.index')->with('msgSuccess','تم الحذف بنجاح');
    }




}
