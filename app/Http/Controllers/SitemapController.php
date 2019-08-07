<?php
namespace App\Http\Controllers;

class SitemapController extends Controller{

    private $prefixStore;
    private $cLocation;
    private $domain;

    public function __construct(){
        $this->prefixStore = config('config.suffix_coupon');
        $this->cLocation = config('config.location');
        $this->domain = url();
    }

    public function index($p = ''){
        $prefixStore = $this->prefixStore;
        $cLocation = $this->cLocation;
        $domain = $this->domain;
        $params = '';

        if($p == 'sitemap'){
            $params = "/main-sitemap/?prefixStore=$prefixStore&domain=$domain&c_location=$cLocation";
        }else if($p == 'sitemap_categories'){
            $params = "/categories/?prefixStore=$prefixStore&domain=$domain&c_location=$cLocation";
        }
        $buildedPath = config('config.api_url') . 'sitemap' . $params;
        echo file_get_contents($buildedPath);
    }

    public function getStoreSitemap($page){
        $prefixStore = $this->prefixStore;
        $cLocation = $this->cLocation;
        $domain = $this->domain;

        $params = "/stores/$page/?prefixStore=$prefixStore&domain=$domain&c_location=$cLocation";
        $buildedPath = config('config.api_url') . 'sitemap' . $params;
        echo file_get_contents($buildedPath);
    }

}