<?php $count = 0; ?> <?php $__currentLoopData = $newestStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $count++; ?> <?php if($count<12): ?> <div><div class=gradient-border-bottom><a href="<?php echo e(route('store-detail', ['alias' => $store->alias] )); ?>" title="<?php echo e($store->name); ?>"><div class="gradient-border owl-box"><div class=owl-box-img><img src="https://res.cloudinary.com/bbbd/image/fetch/w_100/v1542084333/<?php echo e(urlencode($store->logo)); ?>"></div><div class=s-name><b><?php echo e($store->name); ?></b></div><p class=owl-title><?php echo e(str_limit($store->short_description)); ?></p><small><?php echo e(date("Y-m-d")); ?></small><br><b class=owl-link><strong>Get Deals</strong>>></b></div></a></div></div> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>