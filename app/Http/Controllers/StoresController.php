<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Session;
use Illuminate\Http\Request as Re;
use Redis;
use DB;
use Cache;

class StoresController extends Controller {

    public function getDetails($alias, Re $request) {

        $data = [];
        $data['seoConfig']
        return view('store-detail')->with($data);

    }

}