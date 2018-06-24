<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $primaryKey="category_id";
    protected $fillable=['name','parent_id','category_type','data'];

}
