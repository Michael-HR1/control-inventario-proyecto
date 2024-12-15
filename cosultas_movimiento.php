<?php include('includes/header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('includes/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('includes/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">VISTA DE LOS TIMPOS DE MOVIMIENTOS DE PRODUCTOS</h1>

                </div>
                <!-- /.container-fluid -->

                <!-- TABLA -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TABLA DE MOVIMIENTOS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Tipo de movimiento</th>
                                            <th>Cantidad</th>
                                            <th>Fecha de movimiento</th>
                                            <th>Observación</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Tipo de movimiento</th>
                                            <th>Cantidad</th>
                                            <th>Fecha de movimiento</th>
                                            <th>Observación</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php include('control-movimiento/select-table-movimiento.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('includes/footer.php'); ?>