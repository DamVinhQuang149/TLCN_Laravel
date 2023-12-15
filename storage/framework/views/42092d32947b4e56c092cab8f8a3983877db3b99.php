<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home_admin')); ?>">Home</a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo e(count($products)); ?></h3>
                                <p>Products</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="./admin/products" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e(count($manufactures)); ?></h3>

                                <p>Manufactures</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-soup-can"></i>
                            </div>
                            <a href="./admin/manufactures" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-pink">
                            <div class="inner">
                                <h3><?php echo e(count($coupons)); ?></h3>

                                <p>Coupons</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <a href="./admin/coupons" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>

                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e(count($protypes)); ?></h3>

                                <p>Protypes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="./admin/protypes" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner text-white">
                                <h3><?php echo e(count($users)); ?></h3>

                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="./admin/users" class="small-box-footer" style="color:white!important">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3><?php echo e(count($roles)); ?></h3>

                                <p>Roles</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-key"></i>
                            </div>
                            <a href="./admin/roles" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><?php echo e(count($orders)); ?></h3>

                                <p>Orders are being delivered</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-paper-airplane"></i>
                            </div>
                            <a href="./admin/orders" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner text-white">
                                <h3><?php echo e(count($payments)); ?></h3>

                                <p>Payments</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-card"></i>
                            </div>
                            <a href="./admin/payments" class="small-box-footer" style="color:white!important">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                       <!-- <div class="card">-->
                          <!--  <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Sales
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> /.card-header -->
                           <!-- <div class="card-body">
                                <div class="tab-content p-0">
                                   
                                    <div class="chart tab-pane active" id="revenue-chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="sales-chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <!-- solid sales graph -->
                       <!-- // <div class="card bg-gradient-info">
                        //     <div class="card-header border-0">
                        //         <h3 class="card-title">
                        //             <i class="fas fa-th mr-1"></i>
                        //             Sales Graph
                        //         </h3>

                        //         <div class="card-tools">
                        //             <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                        //                 <i class="fas fa-minus"></i>
                        //             </button>
                        //             <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        //                 <i class="fas fa-times"></i>
                        //             </button>
                        //         </div>
                        //     </div>
                        //     <div class="card-body">
                        //         <canvas class="chart" id="line-chart"
                        //             style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        //     </div>
                        //     
                        //     <div class="card-footer bg-transparent">
                        //         <div class="row">
                        //             <div class="col-4 text-center">
                        //                 <input type="text" class="knob" data-readonly="true" value="20"
                        //                     data-width="60" data-height="60" data-fgColor="#39CCCC">

                        //                 <div class="text-white">Mail-Orders</div>
                        //             </div>
                        //             
                        //             <div class="col-4 text-center">
                        //                 <input type="text" class="knob" data-readonly="true" value="50"
                        //                     data-width="60" data-height="60" data-fgColor="#39CCCC">

                        //                 <div class="text-white">Online</div>
                        //             </div>
                        //           
                        //             <div class="col-4 text-center">
                        //                 <input type="text" class="knob" data-readonly="true" value="30"
                        //                     data-width="60" data-height="60" data-fgColor="#39CCCC">

                        //                 <div class="text-white">In-Store</div>
                        //             </div>
                        //             
                        //         </div>
                        //       
                        //     </div>
                        //  
                        // </div>-->
                        <!-- /.card -->

                        <!-- /.card -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">

                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                               <!--     <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                            data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    <!--    <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>-->
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                 <!--   <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>-->
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map card -->
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-clock"></i>
                                    Clock
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">          
                                <canvas id="canvas" width="170" height="170"></canvas>
                                <script>
                                    var canvas = document.getElementById("canvas");
                                    var ctx = canvas.getContext("2d");
                                    var radius = canvas.height / 2;
                                    ctx.translate(radius, radius);
                                    radius = radius * 0.90
                                    setInterval(drawClock, 1000);

                                    function drawClock() {
                                    drawFace(ctx, radius);
                                    drawNumbers(ctx, radius);
                                    drawTime(ctx, radius);
                                    }

                                    function drawFace(ctx, radius) {
                                    var grad;
                                    ctx.beginPath();
                                    ctx.arc(0, 0, radius, 0, 2*Math.PI);
                                    ctx.fillStyle = 'white';
                                    ctx.fill();
                                    grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                                    grad.addColorStop(0, '#333');
                                    grad.addColorStop(0.5, 'white');
                                    grad.addColorStop(1, '#333');
                                    ctx.strokeStyle = grad;
                                    ctx.lineWidth = radius*0.1;
                                    ctx.stroke();
                                    ctx.beginPath();
                                    ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                                    ctx.fillStyle = '#333';
                                    ctx.fill();
                                    }

                                    function drawNumbers(ctx, radius) {
                                    var ang;
                                    var num;
                                    ctx.font = radius*0.15 + "px arial";
                                    ctx.textBaseline="middle";
                                    ctx.textAlign="center";
                                    for(num = 1; num < 13; num++){
                                        ang = num * Math.PI / 6;
                                        ctx.rotate(ang);
                                        ctx.translate(0, -radius*0.85);
                                        ctx.rotate(-ang);
                                        ctx.fillText(num.toString(), 0, 0);
                                        ctx.rotate(ang);
                                        ctx.translate(0, radius*0.85);
                                        ctx.rotate(-ang);
                                    }
                                    }

                                    function drawTime(ctx, radius){
                                        var now = new Date();
                                        var hour = now.getHours();
                                        var minute = now.getMinutes();
                                        var second = now.getSeconds();
                                        //hour
                                        hour=hour%12;
                                        hour=(hour*Math.PI/6)+
                                        (minute*Math.PI/(6*60))+
                                        (second*Math.PI/(360*60));
                                        drawHand(ctx, hour, radius*0.5, radius*0.07);
                                        //minute
                                        minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                                        drawHand(ctx, minute, radius*0.8, radius*0.07);
                                        // second
                                        second=(second*Math.PI/30);
                                        drawHand(ctx, second, radius*0.9, radius*0.02);
                                    }

                                    function drawHand(ctx, pos, length, width) {
                                        ctx.beginPath();
                                        ctx.lineWidth = width;
                                        ctx.lineCap = "round";
                                        ctx.moveTo(0,0);
                                        ctx.rotate(pos);
                                        ctx.lineTo(0, -length);
                                        ctx.stroke();
                                        ctx.rotate(-pos);
                                    }
                                </script>    

                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                       
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                       
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- Calendar -->
                        
                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol17_2/infinityfree.com/if0_35580029/htdocs/resources/views/admin/index.blade.php ENDPATH**/ ?>