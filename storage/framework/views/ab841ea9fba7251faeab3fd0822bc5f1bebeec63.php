<?php $__env->startSection('css'); ?>
    ##parent-placeholder-2f84417a9e73cead4d5c99e05daff2a534b30132##
    
<?php $__env->stopSection(); ?>
    <?php echo $__env->make('blocks.elements.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo '</head><body>'; ?>

    <header class="navbar-fixed-top wrap-header">
        <div class="header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 cl">
                    <a href="<?php echo e(url('/')); ?>">
                    <div class="logo">
                        <img src="https://www.hotdeals.com/public/image/newest/hd-new-logo.svg" class="logo" />
                    </div>
                    </a>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-9 col-xs-8 cl">
                    <form class="form-search">
                        <?php echo $__env->make('elements.search-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 cl">
                <div class="link-menu">
                    <a class="link">Coupons</a>
                    <a class="link">Deals</a>
                    <a class="link">Travel</a>
                    
                </div>
                </div>
            </div>
        </div>
    </header>