

<?php $__env->startSection('content'); ?>
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->

        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- STORE -->
                <div id="store" class="col-lg-12">
                    <div class="store-sort">

                        <h3><strong>CÓ <?php echo e($count); ?> SẢN PHẨM YÊU THÍCH</strong></h3>

                    </div>
                    <!-- store top filter -->
                    
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inven): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->product->id === $inven->product_id): ?>
                                    <!-- product -->
                                    
                                    <div class="col-md-4 col-xs-6">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?php echo e(asset('assets/img/' . $item->product->pro_image)); ?>"
                                                    alt="">
                                                <div class="product-label">
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"></p>
                                                <h3 class="product-name">
                                                    <a
                                                        href="<?php echo e(route('detail.product', ['type_id' => $item->product->type_id, 'id' => $item->product->id])); ?>"><?php echo e($item->product->name); ?></a>

                                                </h3>
                                                
                                                <?php if($item->product->discount_price > 0): ?>
                                                    <h4 class="product-price">
                                                        <del><?php echo e(number_format($item->product->price)); ?>

                                                            VND</del>
                                                    </h4>
                                                    <h4 class="discount-price">
                                                        <?php echo e(number_format($item->product->discount_price)); ?> VND
                                                    </h4>
                                                <?php else: ?>
                                                    <h4 class="discount-price">
                                                        <?php echo e(number_format($item->product->price)); ?> VND
                                                    </h4>
                                                <?php endif; ?>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>

                                                <div class="product-btns">
                                                    <?php if(auth()->check()): ?>
                                                        <?php if($item->product->favorited): ?>
                                                            <button class="add-to-wishlist"><a
                                                                    href=<?php echo e(route('favorite', $item->product->id)); ?>

                                                                    class="heart"><i class="fa fa-heart"></i></a><span
                                                                    class="tooltipp">Bỏ yêu thích</span></button>
                                                        <?php else: ?>
                                                            <button class="add-to-wishlist"><a
                                                                    href=<?php echo e(route('favorite', $item->product->id)); ?>><i
                                                                        class="fa fa-heart-o"></i></a><span
                                                                    class="tooltipp">Yêu thích</span></button>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <button class="add-to-wishlist"><a href=<?php echo e(route('login')); ?>><i
                                                                    class="fa fa-heart-o"></i></a><span class="tooltipp">Yêu
                                                                thích</span></button>
                                                    <?php endif; ?>

                                                    
                                                </div>
                                            </div>
                                            <?php if($inven->remain_quantity): ?>
                                                <a onclick="AddCart(<?php echo e($item->product->id); ?>)" href="javascript:">
                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                            Thêm vào
                                                            giỏ</button>
                                                    </div>
                                                </a>
                                            <?php else: ?>
                                                <div class="out-of-stock">
                                                    <button class="out-of-stock-btn"><i
                                                            class="fa fa-exclamation-circle"></i>
                                                        Hết
                                                        hàng</button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        <?php echo e($favorites->render('/admin/pagination')); ?>

                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\codenew\TLCN_Laravel\resources\views/favorites.blade.php ENDPATH**/ ?>