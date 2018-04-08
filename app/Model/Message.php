<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table="messages";
    protected $primaryKey="message_id";
    protected $fillable=["article_id","category_id","category_name","user_id","to_user_id","body_text","parent_id"];

    public function toUsers()
    {
        return $this->belongsTo('App\User',"to_user_id","id");

    }

    public function fromUsers()
    {
        return $this->belongsTo('App\User',"user_id","id");

    }
}
