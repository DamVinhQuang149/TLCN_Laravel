
<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <form action="/admin/users" method="post" enctype="multipart/form-data">
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
                                        <label for="inputName">First name</label>
                                        <input type="text" id="inputfirst" class="form-control" name="First_name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Last name</label>
                                        <input type="text" id="inputLast" class="form-control" name="Last_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">email</label>
                                        <input type="text" id="inputEmail" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Phone</label>
                                        <input type="text" id="inputPhone" class="form-control" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Username</label>
                                        <input type="text" id="inputName" class="form-control" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Password</label>
                                        <input type="password" id="inputPassword" class="form-control" name="password"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Role</label>
                                        <select id="inputStatus" class="form-control custom-select" name="role">
                                            <option selected disabled>Select one</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->role_id); ?>">
                                                    <?php echo e($value->role_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Image</label>
                                        <input type="file" name="image" id="fileToUpload">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="submit" value="Create New User"
                                class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/admin/users/create.blade.php ENDPATH**/ ?>