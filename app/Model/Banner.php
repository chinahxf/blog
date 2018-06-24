<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table="banners";
    protected $primaryKey="banner_id";
    protected $fillable=['category_id','name','url','to_url'];
}
