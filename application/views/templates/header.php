<!DOCTYPE html>
<html lang="en">

<?php 
	if(!$this->session->userdata('login_session')['login'] == 'CI'){
        redirect('login/logout');
        exit;
	}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homestay - <?= $judul ?></title>

    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/icon/logo_homestay-circle.png">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Select datepicker -->
    <link href="<?= base_url(); ?>assets/plugin/datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugin/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugin/bdaterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css" />

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.bootstrap4.min.css">



    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/loder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
    .tengah {

        vertical-align: middle;
    }

    .scrollbar::-webkit-scrollbar-track {
        background-color: #f5f5f5;
        border-radius: 10px;
    }

    .scrollbar::-webkit-scrollbar {
        width: 10px;
        height: 10px;
        background-color: #f5f5f5;
    }

    .scrollbar::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-image: -webkit-gradient(linear,
                left bottom,
                left top,
                color-stop(1, rgb(78, 115, 223)),
                color-stop(1, rgb(103, 119, 239)),
                color-stop(1, rgb(103, 119, 239)));
    }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>home">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Homestay</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $judul == 'Home' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>home">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $judul == 'Monitor' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>monitor" target="_blank">
                    <i class="fas fa-tv"></i>
                    <span>Monitor</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li
                class="nav-item <?= $judul == 'Kamar' || $judul == 'Pelanggan' || $judul == 'Sales' || $judul == 'Pilihan Sewa' ? 'active'  : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-edit"></i>
                    <span>Pendapatan</span>
                </a>
                <div id="collapseOne"
                    class="collapse <?= $judul == 'Kamar' || $judul == 'Pelanggan' || $judul == 'Sales' || $judul == 'Pilihan Sewa' ? 'show' : '' ?>"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data</h6>
                        <a class="collapse-item <?= $judul == 'Kamar' ? 'active' : '' ?>"
                            href="<?= base_url() ?>kamar">Kamar</a>
                        <a class="collapse-item <?= $judul == 'Pelanggan' ? 'active' : '' ?>"
                            href="<?= base_url() ?>pelanggan">Pelanggan</a>
                        <a class="collapse-item <?= $judul == 'Sales' ? 'active' : '' ?>"
                            href="<?= base_url() ?>sales">Sales</a>
                        <a class="collapse-item <?= $judul == 'Pilihan Sewa' ? 'active' : '' ?>"
                            href="<?= base_url() ?>pilsewa">Pilihan Sewa</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li
                class="nav-item <?= $judul == 'Kategori Biaya' || $judul == 'Jenis Biaya' || $judul == 'Sumber Biaya' || $judul == 'Vendor' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-edit"></i>
                    <span>Pembiayaan</span>
                </a>
                <div id="collapseTwo"
                    class="collapse <?= $judul == 'Kategori Biaya' || $judul == 'Jenis Barang' || $judul == 'Sumber Biaya' || $judul == 'Vendor' ? 'show' : '' ?>"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data</h6>
                        <a class="collapse-item <?= $judul == 'Kategori Biaya' ? 'active' : '' ?>"
                            href="<?= base_url() ?>katbiaya">Kategori Biaya</a>
                        <a class="collapse-item <?= $judul == 'Jenis Barang' ? 'active' : '' ?>"
                            href="<?= base_url() ?>jnsbiaya">Jenis Barang</a>
                        <a class="collapse-item <?= $judul == 'Sumber Biaya' ? 'active' : '' ?>"
                            href="<?= base_url() ?>smbrbiaya">Sumber Biaya</a>
                        <a class="collapse-item <?= $judul == 'Vendor' ? 'active' : '' ?>"
                            href="<?= base_url() ?>vendor">Vendor</a>

                    </div>
                </div>
            </li>

            <?php if( $this->session->userdata('login_session')['level'] == '1' ): ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $judul == 'User' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>user">
                    <i class="fas fa-user"></i>
                    <span>User</span></a>
            </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $judul == 'Pendapatan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>pendapatan">
                    <i class="fas fa-long-arrow-alt-up"></i>
                    <span>Pendapatan</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $judul == 'Pembiayaan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>pembiayaan">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Pembiayaan</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $judul == 'Deposit' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>deposit">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Deposit</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item ">
                <a class="nav-link" href="#">
                <i class="fas fa-money-bill"></i>
                    <span>Pembiayaan</span></a>
            </li> -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="fas fa-boxes"></i>
                    <span>Stok Barang</span></a>
            </li> -->

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="fas fa-box-open"></i>
                    <span>Penggunaan Barang</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li
                class="nav-item <?= $judul == 'Laporan Pendapatan' || $judul == 'Laporan Pembiayaan' ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-print"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseThree"
                    class="collapse <?= $judul == 'Laporan Pendapatan' || $judul == 'Laporan Pembiayaan' || $judul == 'Laporan Transaksi' ? 'show' : '' ?>"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan Data</h6>
                        <!-- <a class="collapse-item" href="#">Pendapatan Pembiayaan</a> -->
                        <a class="collapse-item <?= $judul == 'Laporan Pendapatan' ? 'active' : '' ?>"
                            href="<?= base_url() ?>lapPendapatan">Pendapatan</a>
                        <a class="collapse-item <?= $judul == 'Laporan Pembiayaan' ? 'active' : '' ?>"
                            href="<?= base_url() ?>lapPembiayaan">Pembiayaan</a>
                        <a class="collapse-item <?= $judul == 'Laporan Transaksi' ? 'active' : '' ?>"
                            href="<?= base_url() ?>lapTransaksi">Transaksi</a>
                        <!-- <a class="collapse-item" href="#">Detail Pembiayaan</a> -->
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

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

                    <span class="badge badge-primary mr-1" id="hari">...</span>
                    <span class="badge badge-primary" id="jam">...</span>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('login_session')['nama_lengkap']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url(); ?>/assets/upload/user/<?= $this->session->userdata('login_session')['foto']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <input type="hidden" value="<?= base_url() ?>" id="baseurl">