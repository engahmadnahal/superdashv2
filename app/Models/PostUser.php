<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUser extends Model
{
    use HasFactory;
    protected $table = "post_users";
    protected $fillable = [
        "user_id",
        "data_id",
        "name_one",
        "name_two",
        "logo_one",
        "logo_two",
        "date_match",
        "time_start_match",
        "channel",
        "url_channel",
        "botola",
        "voice_over",
        "url_match"
    ];
}
