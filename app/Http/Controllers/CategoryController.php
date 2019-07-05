<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Session;
use Illuminate\Http\Request as Re;
use Redis;
use DB;
use Cache;

class CategoryController extends Controller {

    public $location = '';
    public $offset = 40;
    public function __construct()
    {
        $this->location = config('config.location');
    }

    public function index() {

        $data = [];
        $seoConfig = $this->seoConfigOf([
            'title' => 'seo_CatTitle',
            'keyword' => '',
            'desc' => 'seo_CatDesc',
            'siteName' => 'seo_siteName',
            'siteDesc' => 'seo_siteDescription'
        ], 1);
        $rs = [];
        $rs['title'] = $this->seoConvert($seoConfig['title'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['desc'] = $this->seoConvert($seoConfig['desc'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['keyword'] = $this->seoConvert($seoConfig['keyword'], $seoConfig['siteName'], $seoConfig['siteDesc']);

        $data['seoConfig'] = $rs;
        $data['cats'] = $this->allCatAndStores(10);
        //dd($data['cat']);
        return view('category')->with($data);
    }
    public function CategoriesDetail($alias, Re $request) {
        $cat = $this->getCatByAlias($alias)[0];
        $stores = $this->getStoresInCat($cat->id, $this->offset);
        $data = [];
        $seoConfig = $this->seoConfigOf([
            'title' => 'seo_CatTitle',
            'keyword' => '',
            'desc' => 'seo_CatDesc',
            'siteName' => 'seo_siteName',
            'siteDesc' => 'seo_siteDescription'
        ], 1);
        $rs = [];
        $rs['title'] = $this->seoConvert($seoConfig['title'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['desc'] = $this->seoConvert($seoConfig['desc'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['keyword'] = $this->seoConvert($seoConfig['keyword'], $seoConfig['siteName'], $seoConfig['siteDesc']);
        $rs['title'] = $cat->name . ' | ' .$rs['title'];

        $data['seoConfig'] = $rs;
        $data['cats'] = $this->allCategory();
        $data['cat'] = $cat;
        $data['stores'] = $stores;
        return view('category_details')->with($data);

    }
    public function getMoreStores($alias, $offset=40, Re $request) {
        $rq = $request->all();
        $offset = (Int)$offset;
        $cat = $this->getCatByAlias($alias)[0];
        $data = [];
        $data['stores'] = $this->getStoresInCat($cat->id, $this->offset, $offset);
        if(empty($data['stores'])) return '';
        return view('elements.cat-store-item-more')->with($data);

    }
    /* func support */
    public function getCatByAlias($alias) {
        $cat = DB::select(DB::raw("select id, name, alias, description, icon, status from categories where alias='$alias' and status = 'published' ORDER BY name ASC"));
        return $cat;
    }
    public function allCategory() {
        $cat = DB::select(DB::raw("select id, name, alias, description, icon, status from categories where status = 'published' ORDER BY name ASC"));
        return $cat;
    }
    public function allCatAndStores($limit=7) {
        $cat = $this->allCategory();
        foreach($cat as $i=>$c) {
            $st = $this->getStoresInCat($c->id, $limit);
            $cat[$i]->stores = $st;
        }
        return $cat;
    }
    public function getStoresInCat($catId, $limit=20, $offset='') {
        $location = $this->location;
        $offset = $offset?"OFFSET $offset":'';
        $stores = DB::select(DB::raw("select id, name, alias, categories_id, best_store, logo from stores WHERE countrycode = '$location' and status='published' and position('$catId' in categories_id)>0 order by best_store DESC, coupon_count DESC $offset limit $limit"));
        return $stores;
    }

}