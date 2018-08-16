<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slogan extends Model
{
    use SoftDeletes;
    protected $table="slogans";
    protected $primaryKey="slogan_id";
    protected $fillable=['category_id','body_text'];
}
