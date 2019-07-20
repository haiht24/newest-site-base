


<?php echo $__env->make('blocks.elements.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>
<?php if(config('config.devmod')): ?>
    <?php echo $__env->yieldContent('scriptDevMod'); ?>
<?php else: ?>
    <?php echo $__env->yieldContent('scriptMix'); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('addfooter'); ?>


<?php if(!empty($_GET['c'])): ?>
    
    <div class="store-modal">
        <div class="modal fade" id="myModal" role="dialog">
        </div>
    </div>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/modals.min.css')); ?>" />
    <script>
        var c_url = '<?php echo e(route('coupon-detail', [ 'goId'=>$_GET['c'] ])); ?>';
        $.get(c_url, function(data) {
            $('#myModal').html(data);
            $('#myModal').modal('show');
            detectCopy();
            $('.coupon-related .location').click(function(){ openGoEv(this); });
        });
    </script>
<?php endif; ?>
<?php echo '</body></html>'; ?>