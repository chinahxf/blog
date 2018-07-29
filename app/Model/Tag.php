<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public function articles()
    {
        return $this->morphedByMany('App\Model\Article', 'taggable','taggables');
    }
}
