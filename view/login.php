<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website peminjaman buku">
    <meta name="author" content="Micko Widi 1953010011">

    <title>Micko Widi | Peminjaman Buku</title>

    <link rel="icon" href="../public/image/profil.JPG">
    <!-- Custom fonts for this template-->
    <link href="../public/library/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../public/library/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

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
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="mx-auto my-auto">
                                    <img src="../public/image/animation.png" alt="Poster" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <p class="font-weight-bold h3 text-gray-900">Website Peminjaman Buku</p><hr>
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                        <?php
                                            session_start();
                                            if (isset($_SESSION['status'])) {
                                                if ($_SESSION['status'] == 'success') {
                                                echo '<div class="alert alert-success" role="alert">'.$_SESSION['message'].'</div>';
                                                } else if ($_SESSION['status'] == 'failed') {
                                                echo '<div class="alert alert-danger" role="alert">'.$_SESSION['message'].'</div>';
                                                }
                                            }
                                            session_destroy();
                                        ?>
                                    </div>
                                    <form class="user" action="../controller/auth.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../public/library/jquery/jquery.min.js"></script>
    <script src="../public/library/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../public/library/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../public/library/sbadmin/js/sb-admin-2.min.js"></script>

</body>

</html>