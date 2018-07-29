<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table="articles";
    protected $primaryKey="article_id";
    protected $fillable=['user_id','category_id','name','body_text','body_html','browse_num','thumb_img'];

    public function getBodyTextAttribute($value)
    {
        return str_limit($value,150);
    }
    public function comments()
    {
        return $this->hasMany('App\Model\Comment',"article_id","article_id");
    }
    public function users()
    {
        return $this->belongsTo('App\User',"user_id","id");
    }
    public function categorys()
    {
        return $this->belongsTo('App\Model\Category','category_id','category_id');
    }
    public function tags()
    {
        return $this->morphToMany('App\Model\Tag','taggable');
    }
}
