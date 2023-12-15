
<?php $__env->startSection('content'); ?>
    <!-- Site wrapper -->
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php $__currentLoopData = $probyid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/products/<?php echo e($value->id); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
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
                                            <label for="inputID">ID</label>
                                            <input readonly value="<?php echo e($value->id); ?>" type="text" id="inputID"
                                                class="form-control" name="id">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input value="<?php echo e($value->name); ?>" type="text" id="inputName"
                                                class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputManu">Manufacture</label>
                                            <select id="inputManu" class="form-control custom-select" name="manu"
                                                required>
                                                <option selected disabled>Select one</option>
                                                <?php $__currentLoopData = $manufactures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($manu->manu_id); ?>"
                                                        <?php echo e($manu->manu_id == $value->manu_id ? 'selected' : ''); ?>>
                                                        <?php echo e($manu->manu_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputType">Protype</label>
                                            <select id="inputType" class="form-control custom-select" name="type"
                                                required>
                                                <option selected disabled>Select one</option>
                                                <?php $__currentLoopData = $protypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($type->type_id); ?>"
                                                        <?php echo e($type->type_id == $value->type_id ? 'selected' : ''); ?>>
                                                        <?php echo e($type->type_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Description</label>
                                            <textarea name="desc" id="summernote" class="form-control" rows="4"><?php echo e($value->description); ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputClientCompany">Price</label>
                                            <input type="text" id="inputClientCompany" class="form-control"
                                                name="price" value="<?php echo e($value->price); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputClientCompany">Discount_price</label>
                                            <input type="text" id="inputClientCompany" class="form-control"
                                                name="discount_price" value="<?php echo e($value->discount_price); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFeature">Feature</label>
                                            <select id="inputFeature" class="form-control custom-select" name="feature"
                                                required>
                                                <option value="" selected disabled>Select one</option>
                                                <option value="1" <?php echo e($value->feature == 1 ? 'selected' : ''); ?>>Nổi bật
                                                </option>
                                                <option value="0" <?php echo e($value->feature == 0 ? 'selected' : ''); ?>>Không
                                                    nổi bật</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Image</label>
                                            <img style="width:50px" src="<?php echo e(asset('assets/img/' . $value->pro_image)); ?>"
                                                alt="">
                                            <input type="file" name="image" id="fileToUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" name="submit" value="Apply change"
                                    class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/admin/products/update.blade.php ENDPATH**/ ?>