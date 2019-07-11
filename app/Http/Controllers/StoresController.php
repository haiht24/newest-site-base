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
        $storeAlias = strtolower($alias);
        $store = DB::table('stores')->select('stores.id AS id','name','logo','social_image','store_url','alias','affiliate_url','categories_id','best_store','custom_keywords','coupon_count','description','short_description','head_description','properties.foreign_key_right AS go','meta_title','meta_desc','cash_back_json','cash_back_total','cash_back_term','sid_name','update_coupon_from','note','store_url')
                ->leftJoin('properties', 'stores.id','=', 'properties.foreign_key_left')
                ->where('stores.alias','=',$storeAlias)
                ->where('stores.countrycode','=','US')
                ->where('stores.status','=','published')
                ->first();
        $storeId = $store->id;
        $store->name_keyword = $this->nameWithKeyword($store->name);
        $coupons = DB::select( DB::raw(
            "SELECT c.id,c.title,c.currency,c.exclusive,c.description,c.created_at,c.expire_date,c.discount,c.coupon_code AS code,c.coupon_type AS type,c.coupon_image AS image,c.sticky,c.verified,c.comment_count,c.latest_comments,c.number_used,c.cash_back,c.note,c.top_order,p.foreign_key_right AS go
                    FROM coupons c
                    JOIN properties p ON c.id = p.foreign_key_left
                    WHERE c.store_id = '{$storeId}'
                    AND c.status = 'published'
                    AND (c.expire_date >= NOW() OR c.expire_date IS NULL)
                    ORDER BY 
                    CASE
                        WHEN c.sticky = 'top' THEN 5
                        WHEN c.sticky = 'hot' THEN 4
                        WHEN c.sticky = 'none' THEN 3
                        WHEN c.sticky IS NULL THEN 2
                        WHEN c.verified = 1 THEN 1
                        WHEN c.sticky = 'pending' THEN 0
                    END DESC,
                    CASE
                        WHEN c.coupon_type='Coupon Code' THEN 1
                        WHEN c.coupon_type='Deal Type' THEN 2
                        WHEN c.coupon_type='Great Offer' THEN 3
                    END ASC,
                    c.top_order ASC,
                    c.created_at DESC,
                    c.title ASC
                    LIMIT 20
                    "
        ) );
        $childStores = DB::select( DB::raw(
            "SELECT name,alias
                    FROM stores
                    where store_url='{$store->store_url}'
                    AND countrycode='US'
                    AND alias != '$storeAlias'
                    AND status='published'
                    "
        ) );

        $store->coupons = $coupons;
        $data['store'] = $store;
        $data = $this->__getSEOConfig($data);//dd($data);
        return view('store-detail')->with($data);

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