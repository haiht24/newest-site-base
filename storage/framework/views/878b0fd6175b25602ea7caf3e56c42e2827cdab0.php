<?php
if(empty($seoConfig)) {
    $seoConfig = [
        'title' => $_SERVER['HTTP_HOST'] . ' | get deals and coupons code',
        'desc' => 'we are find best deals for you!',
        'keyword' => 'coupons, deals, coupon code, get deals, order deals, buy deals, store deals'
    ];
}
?><!DOCTYPE html><html lang=en-US><head><title> <?php echo e($seoConfig['title']); ?> </title><meta content="<?php echo e($seoConfig['keyword']); ?>" name=keywords><meta name=description content="<?php echo e($seoConfig['desc']); ?>"><meta http-equiv=Content-Type content="text/html; charset=utf-8"><meta name=Content-language content=en><meta name=geo.country content=gb><meta name=x-author content="<?php echo e($_SERVER['HTTP_HOST']); ?>"><meta name=apple-mobile-web-app-capable content=yes><meta name=viewport content="width=device-width,minimum-scale=1,maximum-scale=1,user-scalable=no"><link rel="shortcut icon" href="<?php echo e(asset('/favicon.ico')); ?>" type=image/x-icon><link rel="apple-touch-icon image_src" href="<?php echo e(asset('/images/apple-touch-icon.png')); ?>"> <?php echo $__env->yieldContent('css'); ?> <?php if(config('config.devmod')): ?> <?php echo $__env->yieldContent('cssDevMod'); ?> <?php else: ?> <?php echo $__env->yieldContent('cssMix'); ?> <?php endif; ?> <?php echo $__env->yieldContent('js'); ?> <?php echo $__env->yieldContent('head'); ?> <?php echo $__env->yieldContent('header'); ?>