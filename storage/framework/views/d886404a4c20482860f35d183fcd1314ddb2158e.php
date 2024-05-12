<?php if($comments): ?>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($comm->isApproved == 1): ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img width="50" class="media-object" src="<?php echo e(asset('assets/img/' . $comm->user->image)); ?> "
                        alt="Image">
                </a>

                <div class="media-body">
                    <h4 class="media-heading"><?php echo e($comm->user->First_name); ?> <?php echo e($comm->user->Last_name); ?>

                        <small><?php echo e($comm->created_at->format('d/m/Y')); ?></small>
                        <ul class="ratingW-comment">
                            <small>
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $comm->star) {
                                        echo '<li class="on"><div class="star-comm"></div></li>';
                                    } else {
                                        echo '<li><div class="star-comm"></div></li>';
                                    }
                                }
                                ?>
                            </small>
                        </ul>
                    </h4>
                    <p><?php echo e($comm->comment); ?></p>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('my-comment', $comm)): ?>
                        <!-- <form action="" method="get" class="text-right">
                                <a href="" class="btn btn-primary btn-sm">Sửa</a>
                            </form> -->
                        <form class="text-right">
                            <button type="button" id="applyCouponButton"
                                style="background-color: #f80808; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;"
                                onclick="deleteComment(<?php echo e($comm->comm_id); ?>)">
                                <strong>
                                    Xóa
                                </strong>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="alert alert-danger" id="shipping_policy">Bạn chưa đặt sản phẩm này. Vui lòng đặt hàng trước khi đánh giá
        sản phẩm!</div>
<?php endif; ?>
<?php /**PATH D:\khoaluanchuyennganh\code\TLCN_Laravel\resources\views/ajax/ajax_comment.blade.php ENDPATH**/ ?>