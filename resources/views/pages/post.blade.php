
<style>
    body{
        margin: 0;
        padding: 0;
    }
    textarea {
        width: 100%;
        height: 100vh;
        display: block;
        border: 0;
        outline: 0;
    }
</style>
<?php

      function createPost($img,$post,$item){

        return replacePost($img,$post,$item);
    }

     function replacePost($img,$post,$item){
        $arrReplac = ["nameOne","nameTwo","imgPost","botola","beasTime","beasTimeMinusOne","beasTimeMinusTwo","voiceOver","timeStartMatch","urlChannel","dateMatch","timeDate","channel","urlPost","iTag","/imgTag","srTag","stTag"];
        global $postAfterEdit;
         $postAfterEdit = $post;
        for($i = 0 ; $i < count($arrReplac); $i++){
            $postAfterEdit = str_replace("[".$arrReplac[$i]."]",replaceVarible($img,"[".$arrReplac[$i]."]",$item),$postAfterEdit);
        }
        return $postAfterEdit;

    }

     function replaceVarible($img,$varReplace,$items){

        switch ($varReplace){
            case "[nameOne]" :
                return $items->name_one;
            case "[nameTwo]" :
                return $items->name_two;
            case "[imgPost]" :
                return $img;
            case "[botola]" :
                return $items->botola;
            case "[beasTime]" :
                return $items->date_match;
            case "[beasTimeMinusOne]" :
                return intval($items->date_match) - 1;
            case "[beasTimeMinusTwo]" :
                return intval($items->date_match) - 2;
            case "[voiceOver]" :
                return $items->voice_over;
            case "[timeStartMatch]" :
                return $items->time_start_match;
            case "[urlChannel]" :
                return $items->url_channel;
            case "[dateMatch]" :
                return date('Y-m-d');
            case "[timeDate]" :
                return strval($items->date_match);
            case "[channel]" :
                return $items->channel;
            case "[urlPost]" :
                return $items->url_match;
            case "[iTag]" :
                return "<img ";
            case "[/imgTag]" :
                return "/>";
            case "[srTag]" :
                return "src";
            case "[stTag]" :
                return "style";


        }


    }


?>
<textarea readonly>


@foreach($posts as $post)

@foreach($imgs as $imgpost)
@if($imgpost->data_id == $post->data_id)
{{createPost($imgpost->url_img,$site->post_site,$post)}}

============================================

@endif
@endforeach
@endforeach
    </textarea>


