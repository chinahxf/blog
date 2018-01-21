<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="articles";
    protected $primaryKey="article_id";
    protected $fillable=['user_id','category_id','name','body_text','body_html','browse_num','category_name','thumb_img'];

    public function getBodyTextAttribute($value)
    {
        return str_limit(e($value),150);
    }
}
