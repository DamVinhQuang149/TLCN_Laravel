

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
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <h3><strong>CÓ <?php echo e($count_product); ?> KẾT QUẢ TÌM KIẾM PHÙ HỢP</strong></h3>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="<?php echo e(asset('assets/img/' . $product->pro_image)); ?>" alt="">
                                        <div class="product-label">
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"></p>
                                        <h3 class="product-name">
                                            <a
                                                href="<?php echo e(route('detail.product', ['type_id' => $product->type_id, 'id' => $product->id])); ?>"><?php echo e($product->name); ?></a>

                                        </h3>
                                        <?php if($product->discount_price > 0): ?>
                                            <h4 class="product-price">
                                                <del><?php echo e(number_format($product->price)); ?>

                                                    VND</del>
                                            </h4>
                                            <h4 class="discount-price">
                                                <?php echo e(number_format($product->discount_price)); ?> VND
                                            </h4>
                                        <?php else: ?>
                                            <h4 class="discount-price">
                                                <?php echo e(number_format($product->price)); ?> VND
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
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <a onclick="AddCart(<?php echo e($product->id); ?>)" href="javascript:">
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào
                                                giỏ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- /product -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        <?php echo e($products->render('/admin/pagination')); ?>

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

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/search-products.blade.php ENDPATH**/ ?>