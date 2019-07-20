<?php $active = 'terms'; ?>


<?php $__env->startSection('content'); ?>
    <div class="aboutwrap"> <h2 class="aboutwrap_title"><?php echo e($title); ?></h2><?php echo html_entity_decode($docValue); ?></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('statics_page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>