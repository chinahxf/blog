<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->limit = 15;
    }

    public function sendResult($msg = 'ok', $ret = 0, $data = null, $status = 200)
    {
        $r = compact('ret', 'msg');
        if (!is_null($data)) {
            $r['data'] = $data;
        }

        return response()->json($r, $status);
    }

    public function sendSuccess($data = null, $msg = 'success', $status = 200)
    {
        return $this->sendResult($msg, 0, $data, $status);
    }

    public function sendFail($msg = 'fail', $ret = 1, $data = null, $status = 422)
    {
        return $this->sendResult($msg, is_null($ret) || !$ret ? 1 : $ret, $data, $status);
    }
}
