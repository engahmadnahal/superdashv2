<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateImg extends Model
{
    use HasFactory;

    protected $fillable = [
        "site_id",
        "user_id",
        "backg_img",
        "stng_log_one",
        "stng_logo_two",
        "stng_name_one",
        "stng_name_two"
    ];


}
