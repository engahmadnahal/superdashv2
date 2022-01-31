<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "sup_data_postes";
    protected $fillable = [
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
