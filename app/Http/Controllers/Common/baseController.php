<?php

namespace App\Http\Controllers\Common;
use App\Http\Controllers\Controller;

class baseController extends Controller
{
    public function sendResult($msg = 'ok', $ret = 0, $data = null)
    {
        $r = compact('ret', 'msg');
        if (!is_null($data)) {
            $r['data'] = $data;
        }
        return response()->json($r)
            ->header('Content-Type','application/json; charset=UTF-8')
            ->header('X-Header-One','bbb');
    }
    public function sendSuccess($data = null, $msg = 'success')
    {
        return $this->sendResult($msg, 0, $data);
    }
    public function sendFail($msg = 'fail', $ret = 1, $data = null)
    {
        $this->sendResult($msg, is_null($ret) ? 1 : $ret, $data);
        exit;
    }
}
