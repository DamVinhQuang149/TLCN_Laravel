<?php if(Session::has('Cart') != null): ?>
    <?php echo e(Session::get('Cart')->totalQuanty); ?>

<?php else: ?>
    0
<?php endif; ?>
<?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/ajax/ajax_total_quanty_show.blade.php ENDPATH**/ ?>