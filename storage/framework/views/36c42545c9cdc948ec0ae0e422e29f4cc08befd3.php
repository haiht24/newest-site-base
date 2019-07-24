<?php $__env->startSection('cssDevMod'); ?>
    ##parent-placeholder-add95578c3770c95ff2bc608a7e157a29ce17e1d##
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/src/libs/bootstrap.3.3.7.min.css')); ?>" media="all,handheld"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/blogs.min.css')); ?>" media="all,handheld"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssMix'); ?>
    ##parent-placeholder-e9e218ca08909ddb807d504b19b6ff12cdcbede5##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="content-main">
                <img src="https://www.hotdeals.com/blog/wp-content/uploads/2019/07/Where-to-Buy-Top-Quality-Led-Lighting-in-the-US.jpg" alt="image blog"/>
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(url('/')); ?>" title="Home <?php echo e($_SERVER['HTTP_HOST']); ?>">Home</a></li>
                    <li><a href="<?php echo e(url('/')); ?>">Blogs</a></li>
                    <li class="active">17/07/2019/ Brody Hill</li>
                </ul>
                <h1>Where to Buy Top Quality Led Lighting in the US?</h1>

                <?php echo $__env->make('blogs.elements.box-toggle-item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="post-content">
                    <?php echo $__env->make('blogs.elements.box-content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="related-post">
                    <span id="related-post">
                        Related Posts:
                    </span>
                        <ul class="related-link">
                            <li><small>11/06/2019 </small> <a href="">Where to Get Affordable Security Gadgets for Your Home and Office</a></li>
                            <li><small>11/06/2019 </small> <a href="">Where to Get Affordable Security Gadgets for Your Home and Office</a></li>
                        </ul>
                    </div>

                    <div class="tags">
                    <span class="tag">
                    <i class="glyphicon glyphicon-tags"></i> <a href="" rel="tag" class="tags-link">Led Lighting</a>
                    </span>
                    </div>
                </div>
            </div>
            <div class="navpage">
                <a class="navpage-prev">
                    <i class="glyphicon glyphicon-triangle-left"></i> <span>Where to Buy Top Quality Eyeglasses Online ?</span>
                </a>
                <a class="navpage-next">
                    <span>Why You Should Patronize Kendra’s Boutique for Hair Extensions ?</span> <i class="glyphicon glyphicon-triangle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="sidebar-wrap">
            <div class="sidebar-item">
                <div class="sitebar-title">
                    Search Blog
                </div>
                <div class="sidebar-search">
                    <div class="input-group">
                        <input type="hidden" value="<?php echo e(url('/')); ?>" id="home">
                        <input type="text" name="q"  class="form-control search-form-header" />
                        <span class="input-group-btn">
                            <button class="btn btn-search" type="button">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
                            </button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="sidebar-item">
                <div class="sitebar-title">
                    Categories
                </div>
                <ul class="blogs-cat">
                    <?php $__currentLoopData = range(0,10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="blogs-cat-i">
                        <a href="" title="">Activities</a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="sidebar-item">
                <div class="sitebar-title">
                    Tags
                </div>
                <div class="show-tags">
                    <?php $__currentLoopData = range(0,10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="" rel="tag" title="Tags of coupon" style="font-size: <?php echo e(rand(14, 35)); ?>px">tags<?php echo e($v); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptDevMod'); ?>
    ##parent-placeholder-951e41b4b92ca1fa7394c46af4c6595b0d6adb43##
    <script src="<?php echo e(asset('/js/all/mix-libs.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptMix'); ?>
    ##parent-placeholder-ca032044983c896280b5db2c4a245dd6b895d7bb##
    <script src="<?php echo e(asset(mix('/js/home/mix-footer.js'))); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blogs.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>