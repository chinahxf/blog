<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table="categories";
    protected $primaryKey="category_id";
    protected $fillable=['name','parent_id','category_type','data'];

}
