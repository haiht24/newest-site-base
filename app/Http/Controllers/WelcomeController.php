<?php namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request as Re;
use Redis;
use DB;
use Cache;

class WelcomeController extends Controller
{
    public function search(Re $request){
        if($request->ajax()){
            $data = $request->all();
            $rs = DB::select( DB::raw(
                "SELECT id,name,alias,description,logo,note
                    FROM stores
                    WHERE name ilike '%{$data['keyword']}%'
                    AND status = 'published'
                    AND countrycode='US'
                    LIMIT 20
                    "
            ) );

            $limitTitle = 50;
            $limitDes = 100;
            $searchResult = [];
            foreach ($rs as $k => $item) {
                $searchResult[$k]['id'] = $item->id;
                $searchResult[$k]['image'] = $item->logo;
                $searchResult[$k]['title'] = (strlen($item->name) > $limitTitle) ? mb_substr($item->name, 0, $limitTitle) . '...' : $item->name;
                $searchResult[$k]['description'] = (strlen($item->description) > $limitDes) ? mb_substr($item->description, 0, $limitDes) . '...' : $item->description;
                $searchResult[$k]['alias'] = $item->alias;
                $searchResult[$k]['type'] = 'store';
                $searchResult[$k]['note'] = $item->note;
            }
            if( strpos($data['keyword'],'casino') !== FALSE ){
                $searchResult[0]['id'] = 'a0ad5710-f38f-11e7-bacd-7961cdda64ed';
                $searchResult[0]['image'] = 'https://dev-mccorp-co-com.s3.ap-southeast-1.amazonaws.com/29b993f951021f67b1b8bd5cb5b0adebc0.png';
                $searchResult[0]['title'] = 'Unique Casino';
                $searchResult[0]['description'] = null;
                $searchResult[0]['alias'] = 'unique-casino';
                $searchResult[0]['type'] = 'store';
                $searchResult[0]['note'] = 'VanLT - add from auto add store Afftrust';
            }
            else if( strpos($data['keyword'],'host') !== FALSE ){
                $searchResult[0]['id'] = 'b5d61710-9b3a-11e7-af85-c3db148eb572';
                $searchResult[0]['image'] = 'https://s3-ap-southeast-1.amazonaws.com/mccorp-co-com/reseller-club-coupons-logo.png';
                $searchResult[0]['title'] = 'ResellerClub';
                $searchResult[0]['description'] = null;
                $searchResult[0]['alias'] = 'resellerclub';
                $searchResult[0]['type'] = 'store';
                $searchResult[0]['note'] = '';
            }

            $resp['items'] = $searchResult;
            //dd($searchResult);
            return response()->json(['status' => 'success',
                'items' => $searchResult
            ]);
        }
    }
}