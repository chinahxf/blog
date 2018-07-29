<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    protected $table="banners";
    protected $primaryKey="banner_id";
    protected $fillable=['category_id','name','url','to_url'];
}
