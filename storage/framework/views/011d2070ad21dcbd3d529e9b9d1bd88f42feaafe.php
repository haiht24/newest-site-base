<?php $__currentLoopData = $store->coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo $__env->make('elements.coupons_item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>