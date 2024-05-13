
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Comment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Comment</li>
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
                    <h3 class="card-title">Comment</h3>

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
                                <th style="width: 10%">
                                    comm_id
                                </th>
                                <th style="width: 15%">
                                    Name
                                </th>
                                <th style="width: 5%">
                                    Image
                                </th>
                                <th style="width: 15%">
                                    Product_name
                                </th>
                                <th style="width: 15%">
                                    Comment
                                </th>
                                <th style="width: 15%">
                                    Reply Comment
                                </th>
                                <th style="width: 10%">
                                    Status
                                </th>
                                <th style="width: 10%">
                                    Created_at
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($comment->reply_to_comment_id == ''): ?>
                                    <tr>
                                        <td style="width: 10%">#<?php echo e($comment->comm_id); ?></td>

                                        <td style="width: 15%"><?php echo e($comment->First_name); ?> <?php echo e($comment->Last_name); ?></td>
                                        <td style="width: 5%">
                                            <img style="width:50px"src="<?php echo e(asset('assets/img/' . $comment->pro_image)); ?>"
                                                alt="">
                                        </td>
                                        <td class="project_progress" style="width: 15%">
                                            <?php echo e($comment->name); ?>

                                        </td>
                                        <td style="width: 15%"><?php echo e($comment->comment); ?></td>
                                        <td style="width: 15%">
                                            <?php $__currentLoopData = $allcomment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($comment->comm_id == $item->reply_to_comment_id): ?>
                                                    <?php echo e($item->comment); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>
                                        <td class="project_progress text-center" style="width: 10%">
                                            <?php if($comment->isApproved == 1): ?>
                                                Approved
                                            <?php else: ?>
                                                Pending Approval
                                            <?php endif; ?>

                                        </td>
                                        <td class="project_progress text-center" style="width: 10%">
                                            <?php echo e($comment->created_at); ?>

                                        </td>

                                        <td class="project-actions text-right" style="width: 5%">
                                            <form action="comments/<?php echo e($comment->comm_id); ?>/edit" method="POST"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('GET'); ?>
                                                <button type="submit" class="btn btn-info btn-sm"
                                                    style="margin-bottom: 10px;">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Update
                                                </button>
                                            </form>
                                            <form action="comments/<?php echo e($comment->comm_id); ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete(event)">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-container" style="margin-top: 30px; text-align: center;">
                        <?php echo e($comments->render('/admin/pagination')); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\codenew\TLCN_Laravel\resources\views/admin/comments/index.blade.php ENDPATH**/ ?>