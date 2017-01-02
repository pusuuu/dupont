<?php
    session_start();
    if(!isset($_SESSION['auth_id'])){
        header('Location: login.php');
    }

    include "koneksi.php";

    $auth_id    = $_SESSION['auth_id'];
    $auth_name  = $_SESSION['auth_name'];
    $auth_akses = $_SESSION['auth_akses'];

    $ag="admin gudang";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dupont Agricultural Products Indonesia</title>

        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Dupont</a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Halo,
                            <?=$_SESSION['auth_akses']?>
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-home fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <!--Akses 1=Admin Gudang-->
                            <?php if($auth_akses == '1') { ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-database fa-fw"></i> Master
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="masBarang.php">Data Barang</a>
                                    </li>
                                    <li>
                                        <a href="masSupplier.php">Data Supplier</a>
                                    </li>
                                </ul>
                            </li>                        
                            <li>
                                <a href="#">
                                    <i class="fa fa-dropbox fa-fw"></i> Transaksi
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="trxGudangInS.php">Penerimaan Supplier</a>
                                    </li>
                                    <li>
                                        <a href="trxGudangOut.php">Penerimaan Barang Jadi</a>
                                    </li>
                                    <li>
                                        <a href="trxGudangInB.php">Pengeluaran Bahan</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            <!--Akses 2=Admin Produksi-->
                            <?php if($auth_akses == '2') { ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-dropbox fa-fw"></i> Transaksi
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="trxProdOrder.php">Permintaan Bahan</a>
                                    </li>
                                    <li>
                                        <a href="trxProdOut.php">Pengembalian Bahan</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            <!--Akses 3=Pimpinan Gudang-->
                            <?php if($auth_akses == '3') { ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-database fa-fw"></i> Master
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="masBarang.php">Data Barang</a>
                                    </li>
                                    <li>
                                        <a href="masSupplier.php">Data Supplier</a>
                                    </li>
                                    <li>
                                        <a href="masKaryawan.php">Data Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="masDivisi.php">Data Divisi</a>
                                    </li>
                                    <li>
                                        <a href="masGudang.php">Data Gudang</a>
                                    </li>
                                </ul>
                            </li>                        
                            <li>
                                <a href="#">
                                    <i class="fa fa-dropbox fa-fw"></i> Transaksi
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="trxGudangInS.php">Penerimaan Supplier</a>
                                    </li>
                                    <li>
                                        <a href="trxGudangOut.php">Penerimaan Barang Jadi</a>
                                    </li>
                                    <li>
                                        <a href="trxGudangInB.php">Pengeluaran Bahan</a>
                                    </li>
                                    <li>
                                        <a href="trxProdOrder.php">Permintaan Bahan</a>
                                    </li>
                                    <li>
                                        <a href="trxProdOut.php">Pengembalian Bahan</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            <!--Akses selain karyawan-->
                            <?php if($auth_akses == 0) { ?>
                            <script type='text/javascript'>
                                alert('Maaf Anda Tidak Memiliki Akses Web');
                                window.location='login.php'
                            </script>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>