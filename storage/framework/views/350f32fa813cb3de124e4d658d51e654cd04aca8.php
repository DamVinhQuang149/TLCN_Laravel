

<?php $__env->startSection('content'); ?>
    <div class="wrapper">

        <div class="content-wrapper">

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Add Product</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>

                                <li class="breadcrumb-item active">Add Product</li>

                            </ol>

                        </div>

                    </div>

                </div>

            </section>

            <section class="content">

                <form action="/admin/products" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="card card-primary">

                                <div class="card-header">

                                    <h3 class="card-title">General</h3>

                                    <div class="card-tools">

                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">

                                            <i class="fas fa-minus"></i>

                                        </button>

                                    </div>

                                </div>

                                <div class="card-body">

                                    <div class="form-group">

                                        <label for="inputName">Name</label>

                                        <input type="text" id="inputName" class="form-control" name="name" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputStatus">Manufacture</label>

                                        <select id="inputStatus" class="form-control custom-select" name="manu" required>

                                            <option selected disabled>Select one</option>

                                            <?php $__currentLoopData = $manufactures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($manu['manu_id']); ?>">

                                                    <?php echo e($manu['manu_name']); ?>


                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputProtype">Protype</label>

                                        <select id="inputProtype" class="form-control custom-select" name="type"
                                            required>

                                            <option selected disabled>Select one</option>

                                            <?php $__currentLoopData = $protypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value = "<?php echo e($types['type_id']); ?>">

                                                    <?php echo e($types['type_name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputDescription">Description</label>

                                        <textarea name="desc" id="summernote" class="form-control" rows="4" required> </textarea>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputPrice">Price</label>

                                        <input type="text" id="inputPrice" class="form-control" name="price" required
                                            onblur="checkPrice(this)">

                                        <p class="help-block">Giá gốc phải lớn hơn 10.000đ</p>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputDiscountPrice">Discount price</label>

                                        <input type="text" id="inputDiscountPrice" class="form-control"
                                            name="discount_price" required>

                                        <p class="help-block">Giá Discount phải bé hơn giá gốc</p>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputFeature">Feature</label>

                                        <select id="inputFeature" class="form-control custom-select" name="feature"
                                            required>

                                            <option value="" disabled selected>Tùy chọn</option>

                                            <option value="1">Nổi bật</option>

                                            <option value="0">Không nổi bật</option>

                                        </select>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputProjectLeader">Image</label>

                                        <input type="file" name="image" id="fileToUpload" required>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputName">Import quantity</label>

                                        <input type="text" id="inputName" class="form-control" name="import_quantity"
                                            required>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12">

                            <input type="submit" value="Create new Product" class="btn btn-success float-right">

                        </div>

                    </div>

                </form>

            </section>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\duyho\Desktop\TLCN_Laravel\resources\views/admin/products/create.blade.php ENDPATH**/ ?>