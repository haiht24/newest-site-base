<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Session;
use Illuminate\Http\Request as Re;
use Redis;
use DB;
use Cache;

class StoresController extends Controller {

    public $filterType = '', $filterVerified = '';
    function __construct() {
    }

    public function getDetails($alias, Re $request) {
        $key = "storedetail_$alias";
        if(Cache::has($key)) {
            $data = Cache::get($key);
        }else {
            $data = [];
            $storeAlias = strtolower($alias);
            $store = $this->getStore($alias);
            $storeId = $store->id;
            $store->name_keyword = $this->nameWithKeyword($store->name);
            $coupons = $this->getCoupons($store);
            $childStores = DB::select(DB::raw(
                "SELECT name,alias
                    FROM stores
                    where store_url='{$store->store_url}'
                    AND countrycode='US'
                    AND alias != '$storeAlias'
                    AND status='published'
                    "
            ));

            $store->coupons = $coupons;
            $data['store'] = $store;
            $data['childStores'] = $childStores;
            $data = $this->__getSEOConfig($data);//dd($data);
            Cache::put($key, $data, 1440);
        }
        //dd($data);
        $data['couponsType'] = [
            'verify' => 'Verified',
            'Code' => 'Coupon Code',
            'Deals' => 'Deal Type',
            'Great' => 'Great Offer'
        ];
        $data['ssType'] = Session::get('coupon_type_' . $data['store']->alias);
        return view('store-detail')->with($data);

    }

    public function getMoreCoupons($storeId, $offset='', $limit = 20) {
        $data = [];
        $data['store'] = $this->getStore('', $storeId);
        $data['store']->coupons = $this->getCoupons($data['store'], $offset, $limit);
        return view('elements.coupons_item_more')->with($data);
    }
    public function getGo($goId) {
        $data = [];
         $coupons = DB::select( DB::raw("
            SELECT c.id,  c.store_id, c.title,  c.currency,  c.exclusive,  c.description,  c.expire_date,  c.comment_count,  c.discount,  c.comment_count,  c.discount,  c.coupon_type AS type,  c.coupon_code AS code, coupon_type AS type,  c.sticky,  p.foreign_key_right AS go 
            FROM coupons AS c INNER JOIN properties AS p ON p.foreign_key_left = c.id AND p.key = 'coupon' 
            WHERE p.foreign_key_right ='$goId' LIMIT 1
        "))[0];//dd($data);
        $data['c'] = $coupons;
        $data['store'] = $this->getStore('', $coupons->store_id);

        $data['relatedCp'] = DB::select(DB::raw(
            "SELECT c.title,p.foreign_key_right
                    FROM coupons c
                    LEFT JOIN properties p ON c.id = p.foreign_key_left
                    WHERE c.store_id = '{$coupons->store_id}'
                    AND c.status = 'published'
                    AND (c.expire_date >= NOW() OR c.expire_date IS NULL)
                    ORDER BY 
                    CASE 
                        WHEN c.verified = 1 THEN 5 
                        WHEN c.sticky = 'top' THEN 4 
                        WHEN c.sticky = 'hot' THEN 3 
                        WHEN c.sticky = 'none' THEN 2 
                        WHEN c.sticky IS NULL THEN 1 
                    END DESC, c.top_order ASC, c.created_at DESC
                    LIMIT 3
                    "
        ));
        return view('elements.modals_coupon_go')->with($data);
    }

    public function filterType(Re $request) {
        if ($request->ajax()) {
            $params = $request->all();
            $filterCouponByType = Session::has('coupon_type_' . $params['alias']) ? Session::get('coupon_type_' . $params['alias']) : [];
            if(!empty($params['remove'])&&$params['remove']) $filterCouponByType = [];
            else if(count($filterCouponByType)<30)
            if ($params['checked'] && !in_array($params['coupon_type'], $filterCouponByType)) {
                array_push($filterCouponByType, $params['coupon_type']);
            } else $filterCouponByType = array_diff($filterCouponByType, [$params['coupon_type']]);
            Session::put('coupon_type_' . $params['alias'], $filterCouponByType);

            $data = [];
            $data['store'] = $this->getStore($params['alias']);
            $data['store']->coupons = $this->getCoupons($data['store']);
            return view('elements.coupons_item_more')->with($data);
        }
        return '';
    }
    /* function helper */
    public function getStore($alias='', $id='') {
        $storeAlias = strtolower($alias);
        $store = DB::table('stores')->select('stores.id AS id','name','logo','social_image','store_url','alias','affiliate_url','categories_id','best_store','custom_keywords','coupon_count','description','short_description','head_description','properties.foreign_key_right AS go','meta_title','meta_desc','cash_back_json','cash_back_total','cash_back_term','sid_name','update_coupon_from','note','store_url')
            ->leftJoin('properties', 'stores.id','=', 'properties.foreign_key_left');
        if(!empty($alias)) $store = $store->where('stores.alias','=',$storeAlias);
        else if(!empty($id)) $store = $store->where('stores.id', '=', $id);
        return $store->where('stores.countrycode','=','US')
            ->where('stores.status','=','published')
            ->first();
    }
    public function getCoupons($store, $offset='', $limit = 20) {
        $offset = $offset?"OFFSET $offset":'';
        $storeId = $store->id;
        $this->getQueryType($store->alias);
        $filterType = $this->filterType;
        $filterVerified = $this->filterVerified;

        $ssType = [];
        if (Session::has('coupon_type_' . $store->alias)) {
            $ssType = Session::get('coupon_type_' . $store->alias);
        }
        if(empty($ssType)) {
            $caseType = "CASE
                        WHEN c.coupon_type='Coupon Code' THEN 1
                        WHEN c.coupon_type='Deal Type' THEN 2
                        WHEN c.coupon_type='Great Offer' THEN 3
                    END ASC,";
        }else {
            $caseType = "CASE
                        WHEN c.coupon_type='Coupon Code' THEN 1";
            foreach($ssType as $k=>$type) {
                $caseType .=  " WHEN c.coupon_type='$type' THEN " . ($k+2);
            }
            $caseType .= " END ASC,";
        }
        return DB::select( DB::raw(
            "SELECT c.id,c.title,c.currency,c.exclusive,c.description,c.created_at,c.expire_date,c.discount,c.coupon_code AS code,c.coupon_type AS type,c.coupon_image AS image,c.sticky,c.verified,c.comment_count,c.latest_comments,c.number_used,c.cash_back,c.note,c.top_order,p.foreign_key_right AS go
                    FROM coupons c
                    JOIN properties p ON c.id = p.foreign_key_left
                    WHERE c.store_id = '{$storeId}'
                    AND c.status = 'published'
                    AND (c.expire_date >= NOW() OR c.expire_date IS NULL)
                    {$filterType}
                    {$filterVerified}
                    ORDER BY 
                    CASE
                        WHEN c.sticky = 'top' THEN 5
                        WHEN c.sticky = 'hot' THEN 4
                        WHEN c.sticky = 'none' THEN 3
                        WHEN c.sticky IS NULL THEN 2
                        WHEN c.verified = 1 THEN 1
                        WHEN c.sticky = 'pending' THEN 0
                    END DESC,
                    $caseType
                    c.top_order ASC,
                    c.created_at DESC,
                    c.title ASC
                    $offset LIMIT $limit
                    "
        ) );

    }

    public function getQueryType($storeAlias) {

        $filterType = ''; $filterVerified = '';
        if (Session::has('coupon_type_' . $storeAlias)) {
            $ssType = Session::get('coupon_type_' . $storeAlias);
            if (!empty($ssType)) {
                $addType = array();
                foreach ($ssType as $v) {
                    if ($v == "Verified") {
                        $addTypeVrf[] = "c.verified = 1";
                        $filterVerified = "AND (" . implode($addTypeVrf) . ")";
                    }
                    if ($v == 'Coupon Code' || $v == 'Deal Type' || $v == 'Great Offer') {
                        $addType[] = "c.coupon_type = '$v'";
                        $filterType = "AND (" . implode( 'OR ' , $addType) . ")";
                    }
                }
            }
        }
        $this->filterType = $filterType; $this->filterVerified = $filterVerified;
    }
    public function nameWithKeyword($name) {
        if(stripos($name, ' coupon') || stripos($name, ' coupons')){
            return $name .= ' & Promo codes';
        }elseif(stripos($name, ' promo')){
            return $name .= ' & Discount codes';
        }elseif(stripos($name, ' voucher')){
            return $name .= ' & Coupon codes';
        }elseif(stripos($name, ' discount')){
            return $name .= ' & Coupon codes';
        }else{
            return $name .= ' Coupons & Promo codes';
        }
    }

    public function __getSEOConfig($data) {
        $month = date('F');
        $year = date('Y');
        $store = $data['store'];
        $storeName = $store->name;
        $data['seoConfig'] = [
            'title' => '',
            'desc'  => '',
            'keyword' => "$storeName coupon codes, $storeName coupon, $storeName discount, $storeName discount codes, $storeName promo codes",
        ];
        /* SEO with custom new struct */
        $ar = [30,35,40,45,50,55,60,65,70,75,80,85,90,95]; $ak = array_rand($ar); $maxDiscount = $ar[$ak];
        $store_domain = str_replace(['http://','https://','www.'],'', $store->store_url);
        $seoTitle = "$maxDiscount% Off $store_domain Coupons & Promo Codes, ".date("F Y");
        $data['seoConfig']['title'] = $seoTitle;

        $descriptionStruct = "Save with $storeName coupons and promo codes for $month, $year. Today's top $storeName discount";
        // Get title of first coupon
        if (sizeof($store->coupons) > 0) {
            $firstCp = $store->coupons[0];
            $couponTitle = $firstCp->title;
            $descriptionStruct .= ': ' . $couponTitle;
        }
        $data['seoConfig']['desc'] = $descriptionStruct;
        return $data;
    }


}