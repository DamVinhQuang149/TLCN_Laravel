<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bussiness Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Bussiness's Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="btn-group mb-4 ms-auto" id="btn-group">
                    <?php
                        $isAllTimes = !request('timeMount');
                    ?>
                    <a href="/admin/revenues"
                        class="btn btn-light border border-3 border-dark mr-1 rounded-md <?php if($isAllTimes): ?> bg-dark <?php endif; ?>">All
                        times</a>
                    <form action="<?php echo e(route('admin.revenues.getTime')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="btn btn-light border border-3 border-dark <?php if(request('timeMount') == 'day'): ?> bg-dark <?php endif; ?>"
                            name="timeMount" value="day">1d</button>
                        <button type="submit"
                            class="btn btn-light border border-3 border-dark <?php if(request('timeMount') == 'week'): ?> bg-dark <?php endif; ?>"
                            name="timeMount" value="week">1w</button>
                        <button type="submit"
                            class="btn btn-light border border-3 border-dark <?php if(request('timeMount') == '1m'): ?> bg-dark <?php endif; ?>"
                            name="timeMount" value="1m">1m</button>
                        <button type="submit"
                            class="btn btn-light border border-3 border-dark <?php if(request('timeMount') == '3m'): ?> bg-dark <?php endif; ?>"
                            name="timeMount" value="3m">3m</button>
                        <button type="submit"
                            class="btn btn-light border border-3 border-dark <?php if(request('timeMount') == '6m'): ?> bg-dark <?php endif; ?>"
                            name="timeMount" value="6m">6m</button>
                        <button type="submit"
                            class="btn btn-light border border-3 border-dark <?php if(request('timeMount') == '1y'): ?> bg-dark <?php endif; ?>"
                            name="timeMount" value="1y">1y</button>
                    </form>

                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <strong>Revenues</strong>
                                <br>
                                <br>
                                <h3><?php echo e(number_format($totalAmount, '0', ',', '.')); ?> đ</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                            </div>
                            <a href="./orders" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <strong>Success Orders</strong>
                                <br>
                                <br>
                                <h3><?php echo e(count($orders)); ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="./orders" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <strong>RPO</strong>
                                <i class="fas fa-question-circle"
                                    title="Revenue Per Order, average money from each order a customer buys.">
                                </i>

                                <br>
                                <br>
                                <h3><?php echo e(number_format($totalAmount / count($orders), '0', ',', '.')); ?> đ</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <a href="./orders" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <strong>Customer's Emails</strong>
                                <br>
                                <br>
                                <h3><?php echo e(count($emails)); ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <a href="../admin/emails" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <section class="col-lg-7 connectedSortable">
                        <div class="card">
                            <canvas id="revenuesChart" width="400" height="200"></canvas>

                            <script>
                                var ctx = document.getElementById('revenuesChart').getContext('2d');
                                var totalAmount = <?php echo json_encode($totalAmount, 15, 512) ?>;
                                var ordersCount = <?php echo json_encode(count($orders), 15, 512) ?>;

                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        datasets: [{
                                            label: 'Orders vs Revenues',
                                            data: [{
                                                x: ordersCount,
                                                y: totalAmount
                                            }],
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1,
                                            fill: false
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            x: {
                                                type: 'linear',
                                                position: 'bottom'
                                            },
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </section>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/admin/revenues/index.blade.php ENDPATH**/ ?>