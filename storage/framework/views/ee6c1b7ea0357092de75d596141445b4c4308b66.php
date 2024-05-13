

<?php $__env->startSection('content'); ?>
    <div class="wrapper">

        <div class="content-wrapper">

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Add Products</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>

                                <li class="breadcrumb-item active">Flash Sales</li>

                            </ol>

                        </div>

                    </div>

                </div>

            </section>

            <section class="content">

                <form action="/admin/flashsales" method="post" enctype="multipart/form-data">

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
                                    <label for="selectProduct">Select products</label>
                                    <div class="form-group">
                                        <select id="mySelect" name="pro" size="4" required>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                
                                                <option value="<?php echo e($pro['id']); ?>" data-price="<?php echo e($pro['price']); ?>">
                                                    <?php echo e($pro['name']); ?>

                                                </option>
                                                
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div id="selText" style="margin-top:6px"><span>&nbsp;</span></div>
                                        <script>
                                            $(document).ready(function() {
                                                $("select#mySelect").change(function() {
                                                    var selectedPrice = $(this).children("option:selected").data("price");
                                                    $("#show-price").val(selectedPrice);
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="show-price">Original price</label>
                                        <input type="text" id="show-price" class="form-control" name="show-price"
                                            readonly required>
                                    </div>

                                    <div class="form-group">
                                        <label for="import-salesrate">Import sales rate (%)</label>
                                        <input style="color:gray" type="text" id="import-salesrate" class="form-control"
                                            name="import-salesrate" placeholder="40% - 50% for Flashsales" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="flash-sales-end-time">Flash Sales End Time</label>
                                        <input type="datetime-local" id="flash-sales-end-time" class="form-control"
                                            name="flash-sales-end-time" required>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Save" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\khoaluanchuyennganh\code\codenew\TLCN_Laravel\resources\views/admin/flashsales/create.blade.php ENDPATH**/ ?>