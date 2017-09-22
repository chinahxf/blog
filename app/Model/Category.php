<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $primaryKey="category_id";
    protected $fillable=['categoryable_id','categoryable_type','name','parent_id'];
}
