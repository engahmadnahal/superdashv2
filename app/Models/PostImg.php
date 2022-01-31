<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImg extends Model
{
    use HasFactory;
    protected $table = "sup_post_img";
    protected $fillable = ["site_id","url_img","data_id"];
}
