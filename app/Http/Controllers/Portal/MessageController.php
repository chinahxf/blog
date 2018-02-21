<?php

namespace App\Http\Controllers\Portal;

use App\Events\NewMessage;
use App\Http\Controllers\Common\PortalBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class MessageController extends PortalBaseController
{
    public function index()
    {
        event(new NewMessage());
        return view("portal.messages.list");
    }
}
