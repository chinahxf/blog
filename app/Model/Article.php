<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="articles";
    protected $primaryKey="article_id";
    protected $fillable=['user_id','name','body_text','body_html','browse_num'];
}
