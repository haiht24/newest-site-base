<?php
/**
 * Created by PhpStorm.
 * User: Phuong
 * Date: 6/11/2015
 * Time: 3:36 PM
 */

namespace App\Http\Controllers;
use DB;


class StaticPageController extends Controller{
    private function getPageContent($docKey, $pageTitle, $noIndex = false){
        $data = DB::table('static_pages')
            ->select('id','doc_key','doc_value','domain','country_code')
            ->where('doc_key',$docKey)
            ->where('domain', url('/'))
            ->get();

        $result = json_decode(json_encode($data),true);

        $result['title'] = $pageTitle;

        if($noIndex == true){
            $result['noRobot'] = true;
        }

        if(!isset($result['id'])){
            $result['docValue'] = 'Tada!';
        }
        return $result;
    }

    public function privacyPolicy() {
        $getPl = $this->getPageContent('privacy', 'Privacy Policy Cookie Policy', true);
        $getPl['seoConfig'] = [
            'title' => $getPl['title'],
            'desc' => 'Privacy Policy Of ' . $_SERVER['HTTP_HOST'],
            'keyword' => 'Privacy Policy coupon, Privacy Policy us'

        ];

        return view('privacy-policy')->with($getPl);
    }

    public function termsPage() {
        $getTerms = $this->getPageContent('terms', 'Terms & Conditions Conditions', true);
        $getTerms['seoConfig'] = [
            'title' => $getTerms['title'],
            'desc' => 'Privacy Policy Of ' . $_SERVER['HTTP_HOST'],
            'keyword' => 'term coupon, term us'
        ];

        return view('terms')->with($getTerms);
    }



}