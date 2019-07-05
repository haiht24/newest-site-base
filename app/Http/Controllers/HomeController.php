<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Session;
use Illuminate\Http\Request as Re;
use Redis;
use DB;
use Cache;

class HomeController extends Controller {




    public function index(Re $request)
    {
        $location = config('config.location');
        $data = $this->getDataHome($location);
        //dd($data['popularStores'][0]);
        return view('home')->with($data);
    }
    /* for homepage */
    public function getDataHome($location) {
        $topStores = DB::select( DB::raw("SELECT * FROM stores WHERE best_store = 1 AND countrycode='US' order by created_at DESC"));// OR show_in_homepage = 1 OR sticky = 1
        $listStoreId = [];
        foreach($topStores as $v) {
            $listStoreId [] = $v->id;
        }
        $listStoreId = "('" . implode("','", $listStoreId) . "')";
        $rs =  [
            'topStores' => $topStores,
            'seoConfig' => $this->getHomeSeoConfig($location),
            'newestStores' => $this->getNewestStores($location),
            'sliderStores' => $this->getSliderStores($location, 20),
            'sliders' => $this->getSliders($location),
            'topCashBack' => [],
            'popularStores' => $this->getPopularStores($location),
            'couponsList' => $this->getCouponsList($listStoreId),
        ];
        return $rs;

    }
    public function getCouponsList($listStoreId) {
        $rs = DB::select( DB::raw("
                SELECT DISTINCT on (c.store_id) c.id,c.title,c.currency,c.exclusive,c.description,c.created_at,c.expire_date,c.discount,c.coupon_code AS code,c.coupon_type AS type,c.coupon_image AS image,c.sticky,c.verified,c.comment_count,c.latest_comments,c.number_used,c.cash_back,c.note,c.top_order,
                p.foreign_key_right AS go,
                s.*
                    FROM coupons c
                    LEFT JOIN stores s ON c.store_id = s.id
                    LEFT JOIN properties p ON c.id = p.foreign_key_left
                    WHERE 
					c.verified = 1
                    AND c.status = 'published'
					AND s.id in $listStoreId
                    ORDER BY c.store_id DESC limit 30
            "));
        return $rs;
    }
    public function getNewestStores($location) {
        $query = "SELECT 
                *
                FROM stores 
                WHERE best_store = 1 AND status = 'published' AND countrycode = '$location' AND coupons IS NOT NULL ORDER BY last_added_coupon DESC LIMIT 30";
        $rs = DB::select( DB::raw($query));
        return $rs;

    }
    public function getSliderStores($location, $limit=5) {
        $limit = $limit || 20;
        $orderBy = 'ORDER BY last_added_coupon DESC';
        if($location == 'VN'){
            $orderBy = 'ORDER BY random()';
        }
        $query = "SELECT id, name, logo, alias, store_url, affiliate_url, cash_back_json, total_coupons_available, coupon_count FROM stores WHERE show_in_homepage = 1 AND status = 'published' AND (publish_date IS NULL OR publish_date < NOW()) AND countrycode = '$location' AND total_coupons_available > 0 $orderBy LIMIT $limit";
        $rs = DB::select(DB::raw($query));
        return $rs;

    }
    public function getSliders($location) {
        //$cDate = "'" . date("Y-m-d H:m:s") . "'";
        $cDate = "NOW()";
        $selectColumn = 'id,title,description,image,click,alt,link,target,rel,affiliate';
        $query = "SELECT $selectColumn FROM slide_show_items WHERE region = 'show_in_home_page' AND status = 'published' AND country_code = '$location' AND ((published_at IS NULL AND (expires_at > $cDate OR expires_at IS NULL)) OR (published_at IS NOT NULL AND published_at < $cDate AND (expires_at > $cDate OR expires_at IS NULL))) ORDER BY ordering ASC";
        $rs = DB::select( DB::raw($query));
        return $rs;
    }
    public function getPopularStores($location) {
        $query = "SELECT name,alias,custom_keywords from (SELECT name,alias,custom_keywords FROM stores WHERE best_store = 1 AND status = 'published' AND countrycode = '$location' ORDER BY random() asc LIMIT 24) AS tmp ORDER BY name ASC";
        $rs = DB::select(DB::raw($query));
        return $rs;
    }
    public function getHomeSeoConfig($location) {
        /* SEO Config */
        $rs = [];
        $seoConfig = $this->seoConfigOf([
            'title' => 'seo_homeTitle',
            'desc' => 'seo_homeMetaDesc',
            'keyword' => 'seo_homeMetaKeyword',
            'siteName' => 'seo_siteName',
            'siteDesc' => 'seo_siteDescription',
            'disableNoIndex' => 'seo_disableHomeNoIndex'
        ], 1);
        $rs['title'] = $this->seoConvert($seoConfig['title'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['desc'] = $this->seoConvert($seoConfig['desc'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['keyword'] = $this->seoConvert($seoConfig['keyword'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['disableNoIndex'] = $seoConfig['disableNoIndex'];

        return $rs;
    }


    /* end for home */

}