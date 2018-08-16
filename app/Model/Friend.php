<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friend extends Model
{
    use SoftDeletes;
    protected $table="friends";
    protected $primaryKey="friend_id";
    protected $fillable=['name','url','summary','status'];


}
