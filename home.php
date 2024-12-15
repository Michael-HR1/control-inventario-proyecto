<?php include('includes/header.php'); ?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- AQUI VA EL SIDEBAR -->

        <?php include('includes/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- AQUI VA EL TOPBAR -->
                <?php include('includes/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Inventario</h1>

                        <form action="generador_pdf2.php" method="post">
                            <button type="submit" class="btn btn-primary">Reporte de totales PDF</button>
                        </form>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->

                        <!-- precio total de card -->

                        <?php
                        $query = "SELECT SUM(cantidad*precio_unitario) AS total FROM inventario;";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Suma Total de costo </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Total: Q' . number_format($fila['total'], 2) .
                                '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                        ?>



                        <!-- Earnings (Monthly) Card Example -->


                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $query = "SELECT SUM(cantidad) AS total_productos FROM inventario;";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Total Productos </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Productos: ' . number_format($fila['total_productos']) .
                                '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-dolly fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                        ?>

                        <?php
                        $query = "SELECT COUNT(id_categoria) AS tatal_categorias FROM categorias;";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total Categorias </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Categorias: ' . number_format($fila['tatal_categorias']) .
                                '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-boxes-stacked fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                        ?>

                        <!-- ROW CARD 2 -->

                        <!-- card 1 -->
                        <?php
                        $query = "SELECT COUNT(id_proveedor) AS Total_proveedores FROM proveedores;";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Total d eproveedores </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Proveedore: ' . number_format($fila['Total_proveedores']) .
                                '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-building fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                        ?>

                        <?php
                        $query = "SELECT c.nombre_categoria, SUM(i.cantidad) AS totalxcategoria 
                                FROM inventario AS i 
                                JOIN categorias AS c ON i.id_categoria = c.id_categoria
                                WHERE c.nombre_categoria = 'carnes'
                                GROUP BY c.nombre_categoria;";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Total de costo por categoria carne </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Productos: Q' . number_format($fila['totalxcategoria'], 2) .
                                '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-drumstick-bite fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                        ?>

                        <?php
                        $query = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) AS totalxcategoria 
                                FROM inventario AS i 
                                JOIN categorias AS c ON i.id_categoria = c.id_categoria
                                WHERE c.nombre_categoria = 'Embutido'
                                GROUP BY c.nombre_categoria;";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total de costo por categoria Embutidos </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Productos: Q' . number_format($fila['totalxcategoria'], 2) .
                                '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-mortar-pestle fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                        ?>

                        <?php
                        $query = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) AS totalxcategoria 
                                FROM inventario AS i 
                                JOIN categorias AS c ON i.id_categoria = c.id_categoria
                                WHERE c.nombre_categoria = 'Bebidas'
                                GROUP BY c.nombre_categoria;";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Total de costo por categoria Bebidas </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Productos: Q' . number_format($fila['totalxcategoria'], 2) .
                                '</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-bottle-droplet fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                        ?>



                        <!-- end card 1 -->

                        <!-- card 2 -->
                        <?php
                        $query = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) AS totalxcategoria 
                                        FROM inventario AS i 
                                        JOIN categorias AS c ON i.id_categoria = c.id_categoria
                                        WHERE c.nombre_categoria = 'frutas'
                                        GROUP BY c.nombre_categoria";
                        $result = $conexion->query($query);
                        if ($fila = $result->fetch_assoc()) {

                            echo '<div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-success shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                                Total de costo por categoria Frutas </div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">'
                                . 'Productos: Q' . number_format($fila['totalxcategoria'], 2) .
                                '</div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fa-solid fa-apple-whole fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                        }

                        ?>
                        <!-- end card 2 -->


                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">GRAFICO DE BARRA</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="grafica1">Gráfico 1</div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">GRAFICO CIRCULAR</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="grafico2" style="width: 500px; height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ILUSTRACIÓN</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                                            src="img/imagen.png" alt="...">
                                    </div>
                                    <p>Las gráficas son representaciones visuales de datos que sirven para comprender información compleja 
                                        de manera rápida y eficiente. Permiten identificar patrones, tendencias, relaciones y estructuras de 
                                        los datos.
                                    </p>
                                    <p><b>Algunas de las ventajas de las gráficas son:</b></p>
                                    <ul>
                                        <li>Interpretar grandes cantidades de datos de forma clara y coherente</li>
                                        <li>Sacar conclusiones y ver perspectivas de manera visual e intuitiva</li>
                                        <li>Utilizarlas junto con los mapas para explorar los datos o ayudar a contar una historia </li>
                                    </ul>
                                    <p>Existen diferentes tipos de gráficos, como los gráficos de líneas, los gráficos circulares, 
                                        los gráficos de barras, los diagramas de caja y los gráficos de jerarquía.
                                    </p>
                                    
                                </div>
                            </div>


                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">GRAFICA</h6>
                                </div>
                                <div class="card-body">

                                    <div id="grafico3" style="width: 100%; height: 480px;">grafico 3</div>

                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">CONCLUSION</h6>
                                </div>
                                <div class="card-body">
                                    <p>En conclusión, la implementación del proyecto de control de inventario ha permitido optimizar 
                                        la gestión de los productos y movimientos dentro de la organización. A lo largo del desarrollo, se logró:
                                    </p>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript" src="script_graficos/columnChart.js"></script>
            <script type="text/javascript" src="script_graficos/circleChart.js"></script>
            <script type="text/javascript" src="script_graficos/areasChart.js"></script>
            <?php
            include('includes/footer.php'); ?>