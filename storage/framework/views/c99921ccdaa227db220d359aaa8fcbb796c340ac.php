<?php $active = !empty($active)?$active:'';?>
<?php $__env->startSection('cssDevMod'); ?>
##parent-placeholder-add95578c3770c95ff2bc608a7e157a29ce17e1d##
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/src/libs/bootstrap.3.3.7.min.css')); ?>" media="all,handheld"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/static_page.min.css')); ?>" media="all,handheld"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssMix'); ?>
    ##parent-placeholder-e9e218ca08909ddb807d504b19b6ff12cdcbede5##
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset(mix('/css/mix-static.css'))); ?>" media="all,handheld"/>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blocks.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="content">
    <div class="static_container">
        <div class="static">
            <div class="static-wrap">
                <div class="static-menu">
                    <ul class="static-menu-item">
                        <li class="static-item <?php echo e($active=='aboutus'?' active':''); ?>">
                            <a href="<?php echo e(route('aboutus')); ?>" title="about us">About us</a>
                        </li>
                        <li class="static-item <?php echo e($active=='contactus'?' active':''); ?>">
                            <a href="<?php echo e(route('contactus')); ?>" title="contact us">Contact us</a>
                        </li>
                        <li class="static-item <?php echo e($active=='privacy_policy'?' active':''); ?>">
                            <a href="<?php echo e(route('privacy_policy')); ?>" title="privacy policy">Privacy Policy</a>
                        </li>
                        <li class="static-item <?php echo e($active=='terms'?' active':''); ?>">
                            <a href="<?php echo e(route('termsPage')); ?>" title="term and conditions">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>

                <div class="static-content">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('scriptDevMod'); ?>
##parent-placeholder-951e41b4b92ca1fa7394c46af4c6595b0d6adb43##
	<script src="<?php echo e(asset('/js/all/mix-libs.js')); ?>"></script>
	<script src="<?php echo e(asset('/js/app-footer.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blocks.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>