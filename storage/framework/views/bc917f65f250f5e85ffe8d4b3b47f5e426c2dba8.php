<?php if($paginator->hasPages()): ?>
    <ul class="pagination">
        
        <li>
            <a href="<?php echo e($paginator->url(1)); ?>" aria-label="<?php echo app('translator')->get('pagination.first'); ?>">&lsaquo;&lsaquo;</a>
        </li>

        
        <?php if($paginator->currentPage() > 2): ?>
            <li><a href="<?php echo e($paginator->url($paginator->currentPage() - 1)); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">&lsaquo;</a></li>
        <?php endif; ?>

        
        <?php for($i = max(1, $paginator->currentPage() - 1); $i <= min($paginator->currentPage() + 1, $paginator->lastPage()); $i++): ?>
            <li class="<?php echo e(($i == $paginator->currentPage()) ? 'active' : ''); ?>">
                <a href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
            </li>
        <?php endfor; ?>

        
        <?php if($paginator->currentPage() < $paginator->lastPage() - 1): ?>
            <?php if($paginator->currentPage() < $paginator->lastPage() - 2): ?>
                <li class="disabled"><span>&hellip;</span></li>
            <?php endif; ?>
            <li><a href="<?php echo e($paginator->url($paginator->currentPage() + 1)); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</a></li>
        <?php endif; ?>

        
        <li>
            <a href="<?php echo e($paginator->url($paginator->lastPage())); ?>" aria-label="<?php echo app('translator')->get('pagination.last'); ?>">&rsaquo;&rsaquo;</a>
        </li>
    </ul>
<?php endif; ?>
<?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views//admin/pagination.blade.php ENDPATH**/ ?>