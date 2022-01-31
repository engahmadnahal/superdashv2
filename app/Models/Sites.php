<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'user_id',
        'name_site',
        'url_site',
        'post_site',
        'table'
    ];

    protected $table = "sup_sites";
}
