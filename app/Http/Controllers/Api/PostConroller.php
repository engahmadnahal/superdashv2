<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BeasdController as BeasdController;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;


class PostConroller extends BeasdController
{
    public function sendPosts(Request $request){
        $validator = Validator::make($request->all(),[
            "name_one"=>"required",
            "name_two"=>"required",
            "logo_one"=>"required",
            "logo_two"=>"required",
            "date_match"=>"required",
            "time_start_match"=>"required",
            "channel"=>"required",
            "botola"=>"required",
            "voice_over"=>"required",
        ]);
        if($validator->fails()){
            return $this->sendError('Please validate error',$validator->errors());
        }
        $posts = Post::create($request->all());
        $success['name_one'] = $posts->name_one;
        $success['name_two'] = $posts->name_two;
        $success['logo_one'] = $posts->logo_one;
        $success['logo_two'] = $posts->logo_two;
        $success['date_match'] = $posts->date_match;
        $success['time_start_match'] = $posts->time_start_match;
        $success['channel'] = $posts->channel;
        $success['botola'] = $posts->botola;
        $success['voice_over'] = $posts->voice_over;
        $success['url_match'] = $posts->url_match;
        return $this->sendResponse($success,'User register is true');
    }
}
