<?php
if(empty($seoConfig)) {
    $seoConfig = [
        'title' => $_SERVER['HTTP_HOST'] . ' | get deals and coupons code',
        'desc' => 'we are find best deals for you!',
        'keyword' => 'coupons, deals, coupon code, get deals, order deals, buy deals, store deals'
    ];
}
?><!DOCTYPE html><html lang="en-US">
<head>
    <title>
        {{ $seoConfig['title'] }}
    </title>
    <meta content="{{ $seoConfig['keyword'] }}" name="keywords">
    <meta name="description" content="{{ $seoConfig['desc'] }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Content-language" content="en"/>
    <meta name="geo.country" content="gb"/>
    <meta name="x-author" content="{{ $_SERVER['HTTP_HOST'] }}"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon image_src" href="{{ asset('/images/apple-touch-icon.png') }}">
@yield('css')
@if(config('config.devmod'))
    @yield('cssDevMod')
@else
    @yield('cssMix')
@endif
@yield('js')
@yield('head')
@yield('header')