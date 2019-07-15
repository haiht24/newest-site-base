<?php namespace App\Http\Controllers;

use Illuminate\Http\Request as Re;
use DB;

class ContactUsController extends Controller {

    public function index()
    {
        $data['reCapcha_public_key'] = config('config.reCapcha_public_key');
        $data['seoConfig'] = [
            'title' => 'Contact Us' . ' - ' . $_SERVER['HTTP_HOST'] ,
            'desc' => 'Privacy Policy Of ' . $_SERVER['HTTP_HOST'],
            'keyword' => 'contact coupon, contact us'
        ];
        return view('contact-us')->with($data);
    }
}