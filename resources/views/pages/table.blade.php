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

function createTable($table,$item){

    return replacePost($table,$item);
}

function replacePost($table,$item){
    $arrReplac = ["nameOne","nameTwo","logoOne","logoTwo","botola","beasTime","beasTimeMinusOne","beasTimeMinusTwo","voiceOver","timeStartMatch","urlChannel","dateMatch","timeDate","channel","urlPost","srcTag","imgTag"];
    global $postAfterEdit;
    $postAfterEdit = $table;
    for($i = 0 ; $i < count($arrReplac); $i++){
        $postAfterEdit = str_replace("[".$arrReplac[$i]."]",replaceVarible("[".$arrReplac[$i]."]",$item),$postAfterEdit);
    }
    return $postAfterEdit;

}

function replaceVarible($varReplace,$items){

    switch ($varReplace){
        case "[nameOne]" :
            return $items->name_one;
        case "[nameTwo]" :
            return $items->name_two;
        case "[logoOne]" :
            return $items->logo_one;
        case "[logoTwo]" :
            return $items->logo_two;
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
            return date('Y/m')."/".$items->url_match;
        case "[srcTag]" :
            return "src";
        case "[imgTag]" :
            return "<img ";

    }


}


?>

<textarea readonly>
@forelse($tables as $item)
{{createTable($site->table,$item)}}
@empty
  No mathces today
@endforelse
</textarea>

