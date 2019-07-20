

<footer>
    <div class="footer">
        <div class="footer-top">
            <div class="scroll-top">
                <button class="btn btn-scroll" onclick="$('html, body').animate({ scrollTop: 0 }, 'slow');">
                    <i class="glyphicon glyphicon-arrow-up"></i>
                </button>
            </div>
            <div class="blogs-site-name">
                <p><?php echo e($_SERVER['HTTP_HOST']); ?> Blogs</p>
            </div>
        </div>
        <div class="footer-bottom">
            Powered by <?php echo e($_SERVER['HTTP_HOST']); ?>

        </div>
    </div>
</footer>

<?php echo $__env->yieldContent('script'); ?>
<?php if(config('config.devmod')): ?>
    <?php echo $__env->yieldContent('scriptDevMod'); ?>
<?php else: ?>
    <?php echo $__env->yieldContent('scriptMix'); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('addfooter'); ?>

<?php echo '</body></html>'; ?>