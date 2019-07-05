<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* for common function handler */

    public function toArray($data) {
        return json_decode(json_encode($data,1),1);
    }

    /* for seo config */
    public function seoConfigOf($options = [], $rsOption = false) {
        $location = config('config.location');
        $option = array_values($options);
        $seoConfig = $this->toArray(\DB::select(\DB::raw("SELECT * FROM seo_configs WHERE countrycode = '$location' AND option_name in ('" . implode("','", $option) ."')")));

        $rs = [];
        foreach($option as $opt) {
            $rs[$opt] = '';
        }
        if (!empty($seoConfig)) {
            foreach ($seoConfig as $s) {
                foreach($option as $opt) {
                    if($s['option_name']==$opt) $rs[$opt] = $s['option_value'];
                }
            }
        }
        if($rsOption) {
            $rsOp = [];
            foreach($options as $k=>$kv) $rsOp[$k] = $rs[$kv];
            return $rsOp;
        }
        return $rs;
    }
    public function replaceKeyword($str, $key, $replaceValue) {
        if (strpos($str, $key) >= 0) {
            $str = str_replace($key, $replaceValue, $str);
        }
        return $str;
    }
    public function seoConvert($str, $siteName, $siteDesc, $title = '', $cpTitle = '', $cpDiscount = '', $cashBack = '', $isTitle = false) {
        $str = $this->replaceKeyword($str, '%%sitename%%', $siteName);
        $str = $this->replaceKeyword($str, '%%currentmonth%%', date('F'));
        $str = $this->replaceKeyword($str, '%%currentyear%%', date('Y'));
        $str = $this->replaceKeyword($str, '%%sitedesc%%', $siteDesc);
        $str = $this->replaceKeyword($str, '%%sep%%', '-');
        $str = $this->replaceKeyword($str, '%%title%%', $title);
        $str = $this->replaceKeyword($str, '%%StickyCouponTitle%%', $cpTitle);
        $str = $this->replaceKeyword($str, '%%StickyCouponDiscountValue%%', $cpDiscount);

        if(!$isTitle){
            $str = $this->replaceKeyword($str, '%%CashBack%%',  $cashBack ? ' - Earn up to ' . $cashBack . ' Cash Back ' : '');
        }else{
            $str = $this->replaceKeyword($str, '%%CashBack%%', $cashBack ? ' - Up to ' . $cashBack . ' Cash Back ' : '');
        }
        return $str;
    }

}
