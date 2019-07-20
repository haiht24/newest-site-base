<?php $__env->startSection('cssDevMod'); ?>
##parent-placeholder-add95578c3770c95ff2bc608a7e157a29ce17e1d##
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/src/libs/bootstrap.3.3.7.min.css')); ?>" media="all,handheld"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/detail.min.css')); ?>" media="all,handheld"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssMix'); ?>
    ##parent-placeholder-e9e218ca08909ddb807d504b19b6ff12cdcbede5##
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset(mix('/css/mix-detail.css'))); ?>" media="all,handheld"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
<link rel="canonical" href="<?php echo e(route('store-detail', ['alias'=>$store->alias])); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    ##parent-placeholder-040f06fd774092478d450774f5ba30c5da78acc8##
    <ul class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>" title="Home page <?php echo e($_SERVER['HTTP_HOST']); ?>">Home</a></li>
        <li><a href="<?php echo e(url('/category')); ?>" title="all categories">categories</a></li>
        <li class="active"><?php echo e($store->name); ?></li>
    </ul>
    <div class="info">
        <div class="info-item info-image">
            <a href="<?php echo e(( !empty($store->affiliate_url) ? $store->affiliate_url : $store->store_url )); ?>" title="<?php echo e($store->name); ?> link store">
            <div class="info-wrap">
                <img src="<?php echo e($store->logo); ?>" alt="logo <?php echo e($store->name); ?>"/>
            </div>
            </a>
        </div>
        <div class="info-item info-content">
            <div class="info-content-title">
                <h1><?php echo e($store->name_keyword); ?></h1>
            </div>
            <div class="info-content-desc">
                <?php echo e($store->head_description); ?>

            </div>
        </div>
        <div class="info-item info-go">
            <div class="info-button">
                <a href="<?php echo e(( !empty($store->affiliate_url) ? $store->affiliate_url : $store->store_url )); ?>" title="<?php echo e($store->name); ?> link store">
                <button class="btn btn-info">
                    GO TO <?php echo e(str_limit($store->name, 12)); ?>

                </button>
                </a>
            </div>
        </div>
    </div>
    
    <div class="box-show">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="filter-box" data-url="<?php echo e(route('store-filter')); ?>?alias=<?php echo e($store->alias); ?>">
                <button class="btn-type btn btn-all">All</button>
                <?php $__currentLoopData = $couponsType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $activeType = $ssType?in_array($type, $ssType):''; ?>
                     <button class="btn-type btn<?php echo e($activeType?' btn-active':' btn-none'); ?>" data-type="<?php echo e($type); ?>"><?php echo e($title); ?></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="box-list" id="coupons-list">
                
                <?php $__currentLoopData = $store->coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo $__env->make('elements.coupons_item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>

            <div id="show-more" class="show-more" data-url="<?php echo e(route('store-detail-more',['storeId'=>$store->id,'offset'=>''])); ?>">
                <button class="btn btn-success">SHOW MORE...</button>
            </div>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

            <?php if(!empty($store->short_description)): ?>
            <div class="side-bar-right">
                <div class="wrap-side-bar">
                    <h3>About <?php echo e($store->name); ?></h3>
                    <?php echo html_entity_decode($store->short_description); ?>

                </div>
            </div>
            <?php endif; ?>

            <?php if(!empty($childStores)): ?>
                <div class="side-bar-right">
                    <div class="wrap-side-bar">
                        <h3 class="box-header">
                            Related stores
                        </h3>
                        <div>
                            <ul class="list-related" id="style-2">
                                <?php $__currentLoopData = $childStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="filter-item" href="<?php echo e(route('store-detail', ['alias'=>$s->alias])); ?>" title="<?php echo e($s->name); ?> coupons, deals"><?php echo e($s->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
    </div>
    


<div class="about-this">
    <h1>About Richbrook</h1>
    Purchase at Richbrook and save up to 15% OFF on your order with the latest Richbrook Discount Code, Vouchers and sales. There are Richbrook Promo Codes and deals for June 2019. Act now and never miss Richbrook special offers.

    <h4>How to use a Richbrook Special Offer?</h4>
    Find what you like at richbrook.co.uk site, and put them into the cart at first.

    Check for Richbrook Vouchers and Promo Codes at hotdeals.com. Try the code at the page which correctly meet your requirement.
    Go back to richbrook.co.uk and proceed to checkout.And add the code you copied at hotdeals.com. Then click "check out" button.
    You can save a lot with Richbrook Discount Code online.
    Avail all the latest Richbrook Discount Code and discount offers and enjoy up to 15% OFF when you shop at richbrook.co.uk. HotDeals is regularly updated with the list of coupons, deals, discounts added on a regular basis. To apply the promo code or deal at check out for extra savings.

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptDevMod'); ?>
##parent-placeholder-951e41b4b92ca1fa7394c46af4c6595b0d6adb43##
<script src="<?php echo e(asset('/js/all/mix-libs.js')); ?>"></script>
<script src="<?php echo e(asset('/js/app-footer.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/modules/store-detail/index.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/copy.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptMix'); ?>
    ##parent-placeholder-ca032044983c896280b5db2c4a245dd6b895d7bb##
    <script src="<?php echo e(asset(mix('/js/detail/mix-footer.js'))); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>