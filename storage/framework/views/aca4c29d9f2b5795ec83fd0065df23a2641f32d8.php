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
                            <label>
                                Sắp xếp:
                                <select class="input-select select-filter" id="select-filter">
                                    <option value="0">---Lọc theo---</option>
                                    <option value="<?php echo e(Request::url()); ?>?sort_by=kytu_az">Ký tự A-Z</option>
                                    <option value="<?php echo e(Request::url()); ?>?sort_by=kytu_za">Ký tự Z-A</option>
                                    <option value="<?php echo e(Request::url()); ?>?sort_by=tang_dan">Giá tăng dần</option>
                                    <option value="<?php echo e(Request::url()); ?>?sort_by=giam_dan">Giá giảm dần</option>
                                
                                </select>
                            </label>

                            <div class="col-md-offset-7">
                                <form method="get" action="">
                                    <?php echo csrf_field(); ?>
                                    <p>
                                        <label for="amount">Khoảng giá: </label>
                                        <input type="text" id="amount" readonly
                                            style="border:0; color:#f6931f; font-weight:bold;">
                                    </p>

                                    <div id="slider-range"></div>
                                    
                                    <input type="hidden" class="price_from" name="from">
                                    <input type="hidden" class="price_to" name="to">

                                    <input type="submit" value="Lọc giá" class="btn btn-primary filter-price">

                                </form>
                            </div>
                            <h4 class="title text-right" style="color:#f6931f;">
                                <?php if(request()->has('to') && request()->get('to')): ?>
                                     Giá từ: <?php echo e(number_format(request()->get('from'), 0, ',', '.')); ?>đ - <?php echo e(number_format(request()->get('to'), 0, ',', '.')); ?>đ
                                <?php endif; ?>
                            </h4>
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
                                       <!-- <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                    view</span></button>
                                        </div>-->
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

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/laravel/resources/views/products.blade.php ENDPATH**/ ?>