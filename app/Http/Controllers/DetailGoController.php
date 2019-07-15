<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Session;
use Illuminate\Http\Request as Re;
use Redis;
use DB;
use Cache;

class DetailGoController extends Controller {

    public function getGo($goId) {
        $get = DB::select( DB::raw("select * from coupons where go = '$goId'"));
    }


}