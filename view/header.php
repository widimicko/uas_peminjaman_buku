<?php include "../../model/connection.php"; session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website peminjaman buku">
    <meta name="author" content="Micko Widi 1953010011">

    <title>Micko Widi | Peminjaman Buku</title>

    <link rel="icon" href="../../public/image/profil.JPG">
    <!-- Custom fonts for this template-->
    <link href="../../public/library/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <!-- Data Table -->
    <link rel="stylesheet" href="../../public/library/datatables/dataTables.bootstrap4.min.css">
    <!-- Select 2 -->
    <link href="../../public/library/select2/select2.min.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="../../public/library/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include('../sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                        <img class="img-profile rounded-circle"
                            src="../../public/image/profil.JPG">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Keluar
                        </a>
                    </div>
                </li>

            </ul>
            

    </nav>
    <!-- End of Topbar -->

