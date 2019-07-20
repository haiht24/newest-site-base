<?php $__env->startSection('cssDevMod'); ?> ##parent-placeholder-add95578c3770c95ff2bc608a7e157a29ce17e1d##<link rel=stylesheet type=text/css href="<?php echo e(asset('/css/src/libs/bootstrap.3.3.7.min.css')); ?>" media=all,handheld><link rel=stylesheet type=text/css href="<?php echo e(asset('/css/category.min.css')); ?>" media=all,handheld> <?php $__env->stopSection(); ?> <?php $__env->startSection('cssMix'); ?> ##parent-placeholder-e9e218ca08909ddb807d504b19b6ff12cdcbede5##<link rel=stylesheet type=text/css href="<?php echo e(asset(mix('/css/mix-category.css'))); ?>" media=all,handheld> <?php $__env->stopSection(); ?> <?php $__env->startSection('head'); ?> ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##<link rel=canonical href="<?php echo e(url('/category')); ?>"> <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?> <?php
/*
$cat = [
    'automotive',
    'baby',
    'books',
    'clothing',
    'computers',
    'department',
    'electronics',
    'entertainment',
    'finance',
    'grocery',
    'games',
    'flowers',
    'health',
    'internet',
    'home',
    //'it_service',
    'jewelry',
    'office',
    'pet',
    'photography',
    'education',
    'services',
    'sports',
    'telecommunications',
    'travel'
];
*/
?> <div class=category-all><div class=cat-all-title><h1>All category get coupons, deals</h1></div><div class=cat-all-show><div class=wrap-cat-i> <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <div class=cat-show-i><a href="<?php echo e(url('/category/'.$c->alias)); ?>" title="<?php echo e($c->name); ?> category detail show all stores deals, coupons"><i class="c-i <?php echo e($c->icon); ?>"></i></a></div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <div class=clear></div></div></div></div><div class=cat-content><div class=cat-box-item><ul class=breadcrumb><li><a href="<?php echo e(url('/')); ?>" title="Home <?php echo e($_SERVER['HTTP_HOST']); ?>">Home</a></li><li class=active>All Categories</li></ul> <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <div class=cat-item-title><div><a href="<?php echo e(url('/category/'.$c->alias)); ?>" title="<?php echo e($c->name); ?> category"><h3 class=c-title><i class="<?php echo e($c->icon); ?>"></i> <?php echo e($c->name); ?></h3></a></div></div><div class=cat-list-item> <?php $__currentLoopData = $c->stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo $__env->make('elements.cat-store-item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div></div> <?php $__env->stopSection(); ?> <?php $__env->startSection('scriptDevMod'); ?> ##parent-placeholder-951e41b4b92ca1fa7394c46af4c6595b0d6adb43##<script src="<?php echo e(asset('/js/all/mix-libs.js')); ?>"></script><script src="<?php echo e(asset('/js/app-footer.min.js')); ?>"></script><script src="<?php echo e(asset('/js/modules/category/index.min.js')); ?>"></script> <?php $__env->stopSection(); ?> <?php $__env->startSection('scriptMix'); ?> ##parent-placeholder-ca032044983c896280b5db2c4a245dd6b895d7bb##<script src="<?php echo e(asset(mix('/js/mix-category.js'))); ?>"></script> <?php $__env->stopSection(); ?> <?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>