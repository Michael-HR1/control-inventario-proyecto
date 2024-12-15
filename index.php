<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <!-- IMAGEN -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="img/img-inventario.jpg" alt="img-1"
                                    style="width: 100%; height: 100%; object-fit:cover; border-radius: 0;">
                            </div>

                            <!-- COL FORMULARIO -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Control de inventario</h1>
                                    </div>

                                    <?php
                                    session_start();

                                    // Verifica si hay un mensaje en la sesión
                                    if (isset($_SESSION['message'])) { ?>

                                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['message'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                        <?php
                                        // Si fue un login exitoso y se activó el redirect
                                        if (isset($_SESSION['redirect']) && $_SESSION['redirect'] == true) { ?>
                                            <script>
                                                setTimeout(function() {
                                                    window.location.href = "index.php";
                                                }, 2000);
                                            </script>
                                    <?php }
                                        session_unset();
                                    } ?>
                                    <!-- Fin del alert -->

                                    <!-- ----------------------------- FORMULARIO ------------------------------ -->
                                    <form class="user" action="./php/login.proceso.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingrese correo electrónico" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Ingrese su contraseña" required>
                                        </div>


                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->

                                        <button type="submit" class="btn btn-primary btn-user btn-block">Acceder</button>

                                        <!-- ----------- CREDENCIALES CON AUTENTICACIO DE GOOGLE OAUTH2.0 ----------- -->
                                        <hr>
                                        <?php require('autentificacion.php') ?>
                                        <a href="<?php echo $client->createAuthUrl() ?>" class="btn btn-google btn-user btn-block"><i class="fab fa-google fa-fw"></i>Iniciar sesión con Google</a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                        <!-- AND OUTH 2.0 -->
                                    </form>
                                    <!-- --------------------------- AND FORMULARIO ---------------------------- -->
                                    <hr>
                                    <div class="text-center">
                                        <p>No tienes una cuenta con nosotros? <a class="small" href="register.php">registrate qui</a></p>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Olvide mi contraseña?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>