<?php
//Mulai Sesion
session_start();
// Set timezone
date_default_timezone_set('Asia/Jakarta');
if (isset($_SESSION["ses_username"]) == "") {
    header("location: login.php");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Water Teracce</title>
    <link rel="icon" href="dist/img/logo-water.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Alert -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="plugins/alert.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
.navbar-nav .user-dropdown {
    display: flex;
    align-items: center;
}

.navbar-nav .user-dropdown img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
}

.navbar-nav .user-dropdown .user-name {
    margin-left: 10px;
    color: black;
}

.dropdown-menu {
    right: 0;
    left: auto;
}
</style>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-red navbar-light" style="background-color: #182444;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars text-white"></i>
                    </a>
                </li>

            </ul>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-dropdown" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #182444;">
                            <img src="dist/img/user3.png" alt="User Image">
                            <span class="user-name" style="color: #fff;"> <?php echo $data_nama; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="?page=report-data-warga"><i class="bi bi-person"></i> My
                                Report</a>
                            <a class="dropdown-item" href="?page=data-pengguna"><i class="bi bi-gear"></i> User
                                Management</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="return confirm('Apakah anda yakin akan keluar ?')"
                                href="logout.php"><i class="bi bi-box-arrow-right"></i>
                                Logout</a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- SEARCH FORM -->
            <!-- <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">
                        <font color="white">
                            <b>V.1</b>
                        </font>
                    </a>
                </li>
            </ul> -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #182444;">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="dist/img/logo-water.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text" style="color: #fff;"> Water Teracce</span>
            </a>

            <!-- Sidebar -->

            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="">
                    <br>
                    <div class="image">
                        <!-- <img src="dist/img/logo-water.ico"> -->
                    </div>
                    <!-- <div class="info">
                        <a href="index.php" class="d-block">
                            <?php echo $data_nama; ?>
                        </a>
                        <span class="badge badge-success">
                            <?php echo $data_level; ?> 
                            Online
                        </span>
                    </div> -->
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!-- Level  -->
                        <?php
                        if ($data_level == "Administrator") {
                        ?>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Kelola Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=data-pend" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Warga</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=data-kartu" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Kartu Keluarga</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-sync-alt" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Sirkulasi Warga
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=data-lahir" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Kelahiran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=data-mendu" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Meninggal</p>
                                    </a>
                                </li>

                                <!-- <li class="nav-item">
                                    <a href="?page=data-datang" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pendatang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=data-pindah" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pindah</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="?page=data-datang" class="nav-link">
                                <i class="nav-icon fas fas fa-download" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Data Pendatang

                                </p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="?page=data-pindah" class="nav-link">
                                <i class="nav-icon fas fa-upload" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Data Pindah

                                </p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-pdf" style="font-size:15px;"></i>
                                <p style="color: #fff;">
                                    Kelola Surat
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="?page=suket-domisili" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Surat Pengantar</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                        <a href="?page=suket-lahir" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Kelahiran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=suket-mati" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Kematian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=suket-datang" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Pendatang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=suket-pindah" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Pindah</p>
                                        </a>
                                    </li> -->
                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <!-- <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-print" style="font-size:14px;"></i>
                                    <p>
                                        Kelola Laporan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a> -->
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Penduduk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Kartu Keluarga</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Lahir</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Meninggal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pendatang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pindah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">Report</li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-print" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=report-data-warga" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Warga</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">Setting</li>
                        <li class="nav-item">
                            <a href="?page=data-pengguna" class="nav-link">
                                <i class="nav-icon fas fa-user" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Management User
                                </p>
                            </a>
                        </li>



                        <?php
                        } elseif ($data_level == "Ketua RW") {
                        ?>

                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Kelola Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=data-pend" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Warga</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=data-kartu" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Kartu Keluarga</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-sync-alt" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Sirkulasi Warga
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=data-lahir" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Kelahiran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=data-mendu" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Meninggal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=data-datang" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">
                                            Data Pendatang

                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="?page=data-pindah" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">
                                            Data Pindah

                                        </p>
                                    </a>

                                </li>

                                <!-- <li class="nav-item">
                                    <a href="?page=data-datang" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pendatang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=data-pindah" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pindah</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- <li class="nav-item has-treeview">
                            <a href="?page=data-datang" class="nav-link">
                                <i class="nav-icon fas fas fa-download" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Data Pendatang

                                </p>
                            </a>

                        </li> -->


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard" style="font-size:15px;"></i>
                                <p style="color: #fff;">
                                    Approval Surat
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="?page=suket-domisili" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Surat Pengantar</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                        <a href="?page=suket-lahir" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Kelahiran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=suket-mati" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Kematian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=suket-datang" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Pendatang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=suket-pindah" class="nav-link">
                                            <i class="nav-icon far fa-circle text-warning"></i>
                                            <p>Su-Ket Pindah</p>
                                        </a>
                                    </li> -->
                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <!-- <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-print" style="font-size:14px;"></i>
                                    <p>
                                        Kelola Laporan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a> -->
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Penduduk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Kartu Keluarga</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Lahir</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Meninggal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pendatang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Pindah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">Report</li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-print" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=report-data-warga" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p style="color: #fff;">Data Warga</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-header">Setting</li> -->
                        <!-- <li class="nav-item">
                            <a href="?page=data-pengguna" class="nav-link">
                                <i class="nav-icon fas fa-user" style="font-size:14px;"></i>
                                <p style="color: #fff;">
                                    Management User
                                </p>
                            </a>
                        </li> -->

                        <?php
                        }
                        ?>

                        <!-- <li class="nav-item">
                            <a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php"
                                class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt" style="font-size:14px;"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li> -->

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- /. WEB DINAMIS DISINI ############################################################################### -->
                <div class="container-fluid">

                    <?php
                    if (isset($_GET['page'])) {
                        $hal = $_GET['page'];

                        switch ($hal) {

                                //Pengguna
                            case 'data-pengguna':
                                include "admin/pengguna/data_pengguna.php";
                                break;
                            case 'add-pengguna':
                                include "admin/pengguna/add_pengguna.php";
                                break;
                            case 'edit-pengguna':
                                include "admin/pengguna/edit_pengguna.php";
                                break;
                            case 'del-pengguna':
                                include "admin/pengguna/del_pengguna.php";
                                break;

                                //kartu KK
                            case 'data-kartu':
                                include "admin/kartu/data_kartu.php";
                                break;
                            case 'add-kartu':
                                include "admin/kartu/add_kartu.php";
                                break;
                            case 'edit-kartu':
                                include "admin/kartu/edit_kartu.php";
                                break;
                            case 'anggota':
                                include "admin/kartu/anggota.php";
                                break;
                            case 'del-anggota':
                                include "admin/kartu/del_anggota.php";
                                break;
                            case 'del-kartu':
                                include "admin/kartu/del_kartu.php";
                                break;

                                //penduduk
                            case 'data-pend':
                                include "admin/pend/data_pend.php";
                                break;
                            case 'add-pend':
                                include "admin/pend/add_pend.php";
                                break;
                            case 'edit-pend':
                                include "admin/pend/edit_pend.php";
                                break;
                            case 'del-pend':
                                include "admin/pend/del_pend.php";
                                break;
                            case 'view-pend':
                                include "admin/pend/view_pend.php";
                                break;

                                //lahir
                            case 'data-lahir':
                                include "admin/lahir/data_lahir.php";
                                break;
                            case 'add-lahir':
                                include "admin/lahir/add_lahir.php";
                                break;
                            case 'edit-lahir':
                                include "admin/lahir/edit_lahir.php";
                                break;
                            case 'del-lahir':
                                include "admin/lahir/del_lahir.php";
                                break;

                                //mendu
                            case 'data-mendu':
                                include "admin/mendu/data_mendu.php";
                                break;
                            case 'add-mendu':
                                include "admin/mendu/add_mendu.php";
                                break;
                            case 'edit-mendu':
                                include "admin/mendu/edit_mendu.php";
                                break;
                            case 'del-mendu':
                                include "admin/mendu/del_mendu.php";
                                break;

                                //pindah
                            case 'data-pindah':
                                include "admin/pindah/data_pindah.php";
                                break;
                            case 'add-pindah':
                                include "admin/pindah/add_pindah.php";
                                break;
                            case 'edit-pindah':
                                include "admin/pindah/edit_pindah.php";
                                break;
                            case 'del-pindah':
                                include "admin/pindah/del_pindah.php";
                                break;

                                //datang
                            case 'data-datang':
                                include "admin/datang/data_datang.php";
                                break;
                            case 'add-datang':
                                include "admin/datang/add_datang.php";
                                break;
                            case 'edit-datang':
                                include "admin/datang/edit_datang.php";
                                break;
                            case 'del-datang':
                                include "admin/datang/del_datang.php";
                                break;

                                //suket
                            case 'suket-domisili':
                                include "surat/suket_domisili.php";
                                break;
                            case 'suket-lahir':
                                include "surat/suket_lahir.php";
                                break;
                            case 'suket-mati':
                                include "surat/suket_mati.php";
                                break;
                            case 'suket-datang':
                                include "surat/suket_datang.php";
                                break;
                            case 'suket-pindah':
                                include "surat/suket_pindah.php";
                                break;
                            case 'report-data-warga':
                                include "report/dataWarga/index.php";
                                break;

                                //default
                            default:
                                echo "<center><h1> ERROR !</h1></center>";
                                break;
                        }
                    } else {
                        // Auto Halaman Home Pengguna
                        if ($data_level == "Administrator") {
                            include "home/admin.php";
                        } elseif ($data_level == "Ketua RW") {
                            include "home/kaur.php";
                        }
                    }
                    ?>

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                Copyright &copy;
                <a target="_blank" href="">
                    <strong> PT. Megaduta Artha Megah</strong>
                </a>
                All rights reserved.
            </div>
            <b style="color: #fff;">Water Teracce</b>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Modal -->
        <div class="modal fade" id="modalFormLg" tabindex="-1" aria-labelledby="modalFormLgLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormLgLabel">Form Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="output_modal">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    </script>

    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
    </script>


    <?php
    if (isset($_GET['page'])) {
        $hal = $_GET['page'];

        switch ($hal) {
                //Pengguna
            case 'data-pengguna':
                break;
            case 'add-pengguna':
                break;
            case 'edit-pengguna':
                break;
            case 'del-pengguna':
                break;

                //kartu KK
            case 'data-kartu':
                break;
            case 'add-kartu':
                break;
            case 'edit-kartu':
                break;
            case 'anggota':
                break;
            case 'del-anggota':
                break;
            case 'del-kartu':
                break;

                //penduduk
            case 'data-pend':
                break;
            case 'add-pend':
                break;
            case 'edit-pend':
                break;
            case 'del-pend':
                break;
            case 'view-pend':
                break;

                //lahir
            case 'data-lahir':
                break;
            case 'add-lahir':
                break;
            case 'edit-lahir':
                break;
            case 'del-lahir':
                break;

                //mendu
            case 'data-mendu':
                break;
            case 'add-mendu':
                break;
            case 'edit-mendu':
                break;
            case 'del-mendu':
                break;

                //pindah
            case 'data-pindah':
                break;
            case 'add-pindah':
                break;
            case 'edit-pindah':
                break;
            case 'del-pindah':
                break;

            case 'data-datang':
                break;
            case 'add-datang': ?>
    <script src="./public/kelolaSurat/domisili/form.js"></script>
    <?php
                break;
            case 'edit-datang': ?>
    <script src="./public/kelolaSurat/domisili/form.js"></script>
    <?php
                break;
            case 'del-datang':
                break;

                //suket
            case 'suket-domisili': ?>
    <script src="./public/kelolaSurat/domisili/index.js"></script>
    <?php
                break;
            case 'suket-lahir':
                break;
            case 'suket-mati':
                break;
            case 'suket-datang':
                break;
            case 'suket-pindah':
                break;
            case 'report-data-warga': ?>
    <script src="./public/report/dataWarga/index.js"></script>
    <?php
                break;
            default: ?>
    <script>
    console.log('ERROR !');
    </script>
    <?php
                break;
        }
    } else {
        // Auto Halaman Home Pengguna
        if ($data_level == "Administrator") { ?>
    <script src="./public/dashboard/dataWarga/index.js"></script>
    <?php
        } elseif ($data_level == "Ketua RW") { ?>
    <script>
    console.log('Ketua RW !');
    </script>
    <?php
        }
    }
    ?>
</body>

</html>