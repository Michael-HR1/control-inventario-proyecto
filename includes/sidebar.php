<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-solid fa-laptop-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Michael<sup>320</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-gauge-high"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        GESTIÓN DE PRODUCTOS
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu1"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-shop"></i>
            <span>Gestión de inventario</span>
        </a>
        <div id="menu1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Inventario:</h6>
                <a class="collapse-item" href="nuevo-producto.php">Nuevo producto</a>
                <a class="collapse-item" href="mostrar-producto.php">Mostrar productos</a>
                <a class="collapse-item" href="editar-producto.php">Editar producto</a>
                <a class="collapse-item" href="eliminar-producto.php">Eliminar producto</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu2"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>Categoria y proveedores</span>
        </a>
        <div id="menu2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestión de inventario:</h6>
                <a class="collapse-item" href="control-categoria.php">Control de categorias </a>
                <a class="collapse-item" href="contro-proveedores.php">Control de proveedores</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Movimientos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu3"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-arrows-up-down-left-right"></i>
            <span>Movimiento de inventario</span>
        </a>
        <div id="menu3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestión de Movimiento</h6>
                <a class="collapse-item" href="nuevoMovimento.php">Entrada/salida de producto</a>
                <a class="collapse-item" href="cosultas_movimiento.php">Consulta de Movimiento</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Reportes</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Control de usuarios</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->