<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImg;
use App\Models\PostUser;
use App\Models\Sites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function support(){
        return view('pages.support');
    }
    public function getTable($id){
        $tableOfMatches = PostUser::where('user_id','=',session('logged'))->get();
        $site = Sites::where('site_id',$id)->first();
        return view('pages.table')->with('tables',$tableOfMatches)->with('site',$site);
    }

    public function getPost($id){
        $postes = PostUser::where('user_id','=',session('logged'))->get();
        $site = Sites::where('site_id','=',$id)->first();
        $imgPost = PostImg::where('site_id','=',$id)->get();

        return view('pages.post')->with('site',$site)->with('posts',$postes)->with('imgs',$imgPost);

    }

    public function getAllMatches(){
        $matchAddUser = PostUser::select('post_users.data_id')->where('user_id','=',session('logged'));
        $matches = DB::table('sup_data_postes')->whereNotIn('sup_data_postes.data_id',$matchAddUser)->get();
        $matchesOfUser = PostUser::where('user_id','=',session('logged'))->get();
        $userTyp = User::where('user_id',session('logged'))->first()->type;
        return view('pages.matches')->with('matches',$matches)->with('matchesOfUser',$matchesOfUser)->with('userTyp',$userTyp);
    }

    public function addMatch($id){
        $match = Post::where('data_id','=',$id)->first();
        $matchesAddUser = PostUser::all();
        PostUser::create([
            'user_id'=>session('logged'),
            'data_id'=>$match->data_id,
            'name_one'=>$match->name_one,
            'name_two'=>$match->name_two,
            'logo_one'=>$match->logo_one,
            'logo_two'=>$match->logo_two,
            'date_match'=>$match->date_match,
            'time_start_match'=>$match->time_start_match,
            'voice_over'=>$match->voice_over,
            'botola'=>$match->botola,
            'channel'=>$match->channel,
            'url_channel'=>$match->url_channel,
            'url_match'=>$match->url_match
        ]);

        return redirect()->route('pages.matches');
    }
    public function editMatchPage($id){
        $matches = PostUser::where('data_id','=',$id)->where('user_id','=',session('logged'))->first();
        $allSites = Sites::all();
        $imgPostOfTable = PostImg::where('data_id','=',$id)->get();
        return view('pages.editmatch')->with('imgPsot',$imgPostOfTable)->with('match',$matches)->with('sites',$allSites)->with('id',$id);
    }
    public function updateMatch(Request $request , $id){
        $allSites = Sites::where('user_id','=',session('logged'))->get();
        $matches = PostUser::where('data_id','=',$id)->where('user_id','=',session('logged'));
        try {
        $matches->update([
            'name_one'=>$request->name_one,
            'name_two'=>$request->name_two,
            'logo_one'=>$request->logo_one,
            'logo_two'=>$request->logo_two,
            'date_match'=>$request->date_match,
            'time_start_match'=>$request->time_start_match,
            'voice_over'=>$request->voice_over,
            'botola'=>$request->botola,
            'channel'=>$request->channel,
            'url_channel'=>$request->url_channel,
            'url_match'=>$request->url_match
        ]);

        foreach ($allSites as $item){
            $imgOfSite = "img_post_".$item->site_id;
            $count = PostImg::where('data_id','=',$id)->count();
            $chackSite = PostImg::where('site_id','=',$item->site_id)->first();
            $chackData = PostImg::where('data_id','=',$id)->where('site_id','=',$item->site_id)->first();
            if(!$chackData){
                $postImg = PostImg::create([
                    'data_id'=>$id,
                    'site_id'=>$item->site_id,
                    'url_img'=>$request->$imgOfSite
                ]);
            }else{
                PostImg::where('data_id','=',$id)->where('site_id','=',$item->site_id)->update([
                    'url_img'=>$request->$imgOfSite
                ]);

            }

        }
        }catch(\Exception $e){
            return redirect()->route('pages.editmatch',$id)->with('msgError','هناك حقول فارغة !');
        }
        return redirect()->route('pages.matches')->with('msgSuccess','تم التحديث بنجاح !');
    }

    public function deleteMatch($id){
        $post = PostUser::where('data_id','=',$id)->where('user_id','=',session('logged'));
        $post->delete();
        return redirect()->route('pages.matches')->with('msgSuccess','تم الحذف بنجاح');
    }
    public function deleteAllMatch(){
        Post::truncate();
        return redirect()->route('pages.matches')->with('msgSuccess','تم الحذف بنجاح');
    }
}
