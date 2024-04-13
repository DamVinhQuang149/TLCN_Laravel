

<?php $__env->startSection('content'); ?>

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Add Advertisements</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>

                                <li class="breadcrumb-item active">Add Advertisements</li>

                            </ol>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->

            </section>



            <!-- Main content -->

            <section class="content">

                <form action="/admin/advertisements" method="post" enctype="multipart/form-data">

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

                                        <label for="inputName">Title</label>

                                        <input type="text" id="inputName" class="form-control" name="title" required>

                                    </div>
                                    <div class="form-group">

                                        <label for="inputDescription">Content</label>

                                        <textarea name="content" id="summernote" class="form-control" rows="4" required> </textarea>

                                    </div>
                                    <div class="form-group">

                                        <label for="inputName">Offer</label>

                                        <input type="text" id="inputName" class="form-control" name="offer" required>

                                    </div>
                                    <div class="form-group">

                                        <label for="inputName">Contact_info</label>

                                        <input type="text" id="inputName" class="form-control" name="contact_info" required>

                                    </div>
                                </div>

                                <!-- /.card-body -->

                            </div>

                            <!-- /.card -->

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12">

                            <input type="submit" name="submit" value="Create new Advertisements"

                                class="btn btn-success float-right">

                        </div>

                    </div>

                </form>

            </section>

            <!-- /.content -->

        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TLCN_Laravel\resources\views/admin/advertisements/create.blade.php ENDPATH**/ ?>