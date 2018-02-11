<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table="messages";
    protected $primaryKey="message_id";
    protected $fillable=[];

    public function toUsers()
    {
        return $this->belongsTo('App\User',"to_user_id","id");

    }

    public function fromUsers()
    {
        return $this->belongsTo('App\User',"user_id","id");

    }
}
