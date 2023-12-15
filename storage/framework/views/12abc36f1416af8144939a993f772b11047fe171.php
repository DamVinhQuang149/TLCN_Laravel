<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Email Managements</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Customer's Emails</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer's Emails</h3>

                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    Email ID
                                </th>
                                <th class="text-center" style="width: 30%">
                                    Emails
                                </th>
                                <th class="text-center" style="width: 30%">
                                    Created at
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center" style="width: 9%"><?php echo $value->email_id; ?></td>
                                    <td class="text-center" style="width: 30%"><?php echo $value->email; ?></td>
                                    <td class="text-center" style="width: 30%">
                                        <?php 
                                            $created_at = strtotime($value->created_at);
                                            echo '<span style="margin-right: 25px;">' . date('d/m/Y', $created_at) . '</span>At:<span style="margin-left: 5px;">' . date('g:i a',                                                       $created_at) . '</span>';
                                        ?>
                                    </td>

                                    <td class="project-actions text-right" style="width:15%">
                                        <form action="emails/<?php echo e($value->email_id); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" style="margin-top:6px"
                                                onclick="confirmDelete(event)">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        <?php echo e($emails->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/admin/emails/index.blade.php ENDPATH**/ ?>