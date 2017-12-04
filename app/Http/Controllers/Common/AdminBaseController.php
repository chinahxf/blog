<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

class AdminBaseController extends BaseController
{
    public function __construct()
    {
        $this->limit=15;
    }
}
