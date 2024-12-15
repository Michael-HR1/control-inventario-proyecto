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
                    <h1 class="h3 mb-4 text-gray-800">VISTA DE TODOS LOS PRODUCTOS ACTUALES</h1>

                </div>
                <!-- /.container-fluid -->

                <!-- TABLA -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TABLA DE PRODUCTOS</h6>
                            <form action="generador-proveedor-pdf.php" method="post">
                                <button type="submit" class="btn btn-primary">Generar PDF</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id_proveedor</th>
                                            <th>nombre_proveedor</th>
                                            <th>telefono_proveedor</th>
                                            <th>direccion_proveedor</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>id_proveedor</th>
                                            <th>nombre_proveedor</th>
                                            <th>telefono_proveedor</th>
                                            <th>direccion_proveedor</th>
                                    </tfoot>
                                    <tbody>
                                        <?php include('control-inventarios/table-contro-proveed.php'); ?>
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