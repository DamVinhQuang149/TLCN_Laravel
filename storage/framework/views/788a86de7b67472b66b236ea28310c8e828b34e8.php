



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
                            <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inven): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->id === $inven->product_id): ?>
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
                                                            class="tooltipp">Yêu thích</span></button>

                                                    

                                                </div>

                                            </div>

                                            <?php if($inven->remain_quantity): ?>
                                                <a onclick="AddCart(<?php echo e($product->id); ?>)" href="javascript:">
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

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/search-products.blade.php ENDPATH**/ ?>