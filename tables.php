<?php include('includes/header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('includes/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('includes/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Control de usuarios</h1>
                    <p class="mb-4">Sistema de integración y administración de usuarios <a target="_blank"
                            href="https://wa.link/2vlfxj">Asistencia tecnica</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- MODAL DE INSERT -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar usuarios</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuarios</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="control-usuarios/create-usuario.php" method="POST">

                                                <div class="mb-3">
                                                    <label for="name">Nombre de Usuario</label>
                                                    <input type="text" name="name" class="form-control" require>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email">Correo Electrónico</label>
                                                    <input type="text" name="email" class="form-control" require>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password">Contraseña</label>
                                                    <input type="text" name="password" class="form-control" require>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone">Teléfono</label>
                                                    <input type="number" name="phone" class="form-control" require>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr> <!-- El tr es la fila -->
                                    <th>Id</th> <!-- el (th) son los cuadritos de cada sección -->
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Cargo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include('consultas/select-table.php'); ?>
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