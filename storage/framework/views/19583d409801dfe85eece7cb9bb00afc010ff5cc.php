
<?php $__env->startSection('content'); ?>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style1.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/responsive.css')); ?>">

    </head>

    <body>
        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-content-right">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="<?php echo e(asset('assets/img/' . $probyid['pro_image'])); ?>" alt=""
                                                width="70%">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="product-inner" style="font-weight:600">

                                        <h2 class="product-name" style="color: #FE9705"><strong>
                                                <?php echo e($probyid['name']); ?></strong></h2>
                                        <ins class="product-inner-price">Loại sản phẩm: <?php echo e($probyid['type_name']); ?></ins>
                                        <br>
                                        <ins class="product-inner-price">Nhà sản xuất: <?php echo e($probyid['manu_name']); ?></ins>
                                        <br>
                                        <div class="remain-quantity">Tồn kho: <?php echo e($inventories['remain_quantity']); ?></div>
                                        <div style="margin-top:10px; color:#fe9705">
                                            <h5><del><strong><?php echo e(number_format($probyid['price'])); ?> VND</strong></del></h5>
                                        </div>
                                        <div class="product-inner-price">
                                            <h4><strong><?php echo e(number_format($probyid['discount_price'])); ?> VND</>
                                                </strong></h4>
                                        </div>
                                        <div class="product-inner-price">
                                            <?php if($inventories->remain_quantity): ?>
                                                <div class="quantity">
                                                    <input id="quanty-item-<?php echo e($probyid->id); ?>" type="number"
                                                        class="input-text qty text" title="Qty" probyid="1"
                                                        size="1" name="quantity" min="1"
                                                        max=<?php echo e($inventories->remain_quantity); ?> step="1"
                                                        value="1">
                                                </div>

                                                <button class="add-to-card-detail"
                                                    onclick="AddQuantyCart(<?php echo e($probyid->id); ?>)" type="submit"
                                                    name="submit">thêm vào giỏ hàng</button>
                                            <?php else: ?>
                                                <button class="out-of-stock-detail"> HẾT HÀNG</button>
                                            <?php endif; ?>

                                        </div>

                                        <div role="tabpanel">
                                            <ul class="product-tab" role="tablist">
                                                <li role="presentation" class="active"><a href="#home"
                                                        aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                                                <li role="presentation"><a href="#profile" aria-controls="profile"
                                                        role="tab" data-toggle="tab">Đánh giá</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                    <h2>Mô tả sản phẩm</h2>
                                                    <p><?php echo e($probyid->description); ?></p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                                    <h2>Đánh giá sản phẩm</h2>
                                                    <?php if(auth()->check()): ?>
                                                        <form>

                                                            <div class="submit-review">
                                                                
                                                                <input type="hidden" class="product_id_comment"
                                                                    value="<?php echo e($probyid->id); ?>">
                                                                <div class="rating-chooser" id="star_rating">

                                                                    <h6>Đánh giá sao</h6>

                                                                    <!-- Rating Stars Box -->
                                                                    <input type="hidden" class="star_rating_value">

                                                                    
                                                                    <ul class="ratingW">
                                                                        <?php if($starRating): ?>
                                                                            <?php
                                                                            for ($i = 1; $i <= 5; $i++) {
                                                                                if ($i <= $starRating->star) {
                                                                                    echo '<li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>';
                                                                                } else {
                                                                                    echo '<li><a href="javascript:void(0);"><div class="star"></div></a></li>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        <?php else: ?>
                                                                            <li class="on"><a
                                                                                    href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li class="on"><a
                                                                                    href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li class="on"><a
                                                                                    href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li><a href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                            <li><a href="javascript:void(0);">
                                                                                    <div class="star"></div>
                                                                                </a></li>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                                <p><label for="review">Bình luận</label>
                                                                    <textarea name="comment" class="comment" id="" cols="30" rows="10" style="text-align: left"></textarea>
                                                                </p>
                                                                
                                                                <button type="button" id="applyCouponButton"
                                                                    style="background-color: #FE9705; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer; margin-bottom: 10px;"
                                                                    onclick="writeComment()">
                                                                    <strong>
                                                                        Gửi
                                                                    </strong>
                                                                </button>
                                                                <div id="comment-result" style="color: red;"></div>
                                                            </div>
                                                        </form>
                                                    <?php else: ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Đăng nhập để bình luận</strong> click vào đây <a
                                                                href="<?php echo e(route('login')); ?>">Đăng nhập</a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div id="list-comment">
                                                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="media">
                                                                <a class="pull-left" href="#">
                                                                    <img width="50" class="media-object"
                                                                        src="<?php echo e(asset('assets/img/' . $comm->user->image)); ?> "
                                                                        alt="Image">
                                                                </a>

                                                                <div class="media-body">
                                                                    <h4 class="media-heading">
                                                                        <?php echo e($comm->user->First_name); ?>

                                                                        <?php echo e($comm->user->Last_name); ?>


                                                                        <small><?php echo e($comm->created_at->format('d/m/Y')); ?></small>
                                                                        <ul class="ratingW-comment">
                                                                            <small>
                                                                                <?php if($starRating): ?>
                                                                                    <?php
                                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                                        if ($i <= $starRating->star) {
                                                                                            echo '<li class="on"><div class="star-comm"></div></li>';
                                                                                        } else {
                                                                                            echo '<li><div class="star-comm"></div></li>';
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                <?php endif; ?>
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
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                    <div class="pagination-container"
                                                        style="margin-top: 30px; text-align: center;">
                                                        <?php echo e($products->render('/admin/pagination')); ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr size="5px" align="center" color=#e6e9ee />
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="products-tabs">
                                        <!-- tab -->
                                        <div id="pap1" class="tab-pane active">
                                            <div class="products-slick" data-nav="#slick-nav-1">
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img style="width=100px"
                                                                src="<?php echo e(asset('assets/img/' . $product['pro_image'])); ?>"
                                                                alt="">
                                                            <div class="product-label">
                                                                <span class="new">MỚI</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category"></p>
                                                            <h3 class="product-name"><a
                                                                    href="<?php echo e(route('detail.product', ['type_id' => $product->type_id, 'id' => $product->id])); ?>"><?php echo e($product['name']); ?></a>
                                                            </h3>
                                                            <h5 class="product-price">
                                                                <strong><del><?php echo e(number_format($product->price)); ?>

                                                                        VND</del></strong>
                                                            </h5>
                                                            <h4 class="discount-price">
                                                                <strong>
                                                                    <?php echo e(number_format($product->discount_price)); ?>

                                                                    VNĐ</strong>
                                                            </h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i
                                                                        class="fa fa-heart-o"></i><span
                                                                        class="tooltipp">Yêu thích</span></button>
                                                                
                                                            </div>
                                                        </div>
                                                        <?php $__currentLoopData = $inven; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($value->product_id === $product->id): ?>
                                                                <?php if($value->remain_quantity > 0): ?>
                                                                    <a onclick="AddCart(<?php echo e($product->id); ?>)"
                                                                        href="javascript:">
                                                                        <div class="add-to-cart">
                                                                            <button class="add-to-cart-btn"><i
                                                                                    class="fa fa-shopping-cart"></i>
                                                                                Thêm vào giỏ</button>

                                                                        </div>
                                                                    </a>
                                                                <?php else: ?>
                                                                    <div class="out-of-stock">
                                                                        <button class="out-of-stock-btn"><i
                                                                                class="fa fa-exclamation-circle"></i> Hết
                                                                            hàng</button>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <!-- /product -->
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/detail-product.blade.php ENDPATH**/ ?>