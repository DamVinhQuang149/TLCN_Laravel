<?php $__env->startSection('content'); ?>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <form action="<?php echo e(route('changeimage.post', ['user_id' => $user->user_id])); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">User_ID</label>
                                    <input readonly value="<?php echo e($user->user_id); ?>" type="text" id="inputID" class="form-control" name="user_id">
                                </div>
                                <div class="form-group">
                                    <img style="width:50px" src="<?php echo e(asset('assets/img/' . $user->image)); ?>" alt="">
                                    <input type="file" name="image" id="fileToUpload">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" name="submit" value="Lưu ảnh" style="background-color: #80bb35;" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/change-image.blade.php ENDPATH**/ ?>