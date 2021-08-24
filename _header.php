<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker']) || isset($_SESSION['perawat']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['kasir'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Puskesmas</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('_assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/css/fullpagenav.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/css/simple-sidebar.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/libs/DataTables/datatables.min.css');?>" rel="stylesheet">
</head>
<body>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <!-- The overlay -->
    <div id="myNav" class="overlay">
        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- Overlay content -->
        <div class="overlay-content">
            <a href="<?=base_url('dashboard')?>">Dashboard</a>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter'])) { ?>
                <a href="<?=base_url('rekammedis/data.php')?>">Rekam Medis</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>
                <a href="<?=base_url('pasien/data.php')?>">Data Pasien</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter']) || isset($_SESSION['kasir'])) { ?>
                <a href="<?=base_url('kunjungan/data.php')?>">Data Kunjungan</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter'])) { ?>
                <a href="<?=base_url('tandavital/data.php')?>">Data Tanda Vital</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>
                <a href="<?=base_url('diagnosa/data.php')?>">Data Diagnosa</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin'])) { ?>
                <a href="<?=base_url('tindakan/data.php')?>">Data Tindakan</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>
                <a href="<?=base_url('penyakit/data.php')?>">Data Penyakit</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin'])) { ?>
                <a href="<?=base_url('dokter/data.php')?>">Data Dokter</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin'])) { ?>
                <a href="<?=base_url('poliklinik/data.php')?>">Data Poliklinik</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>
                <a href="<?=base_url('obat/data.php')?>">Data Obat</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['apoteker'])) { ?>
                <a href="<?=base_url('riwayat_obat/data.php')?>">Stok Obat</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['apoteker'])) { ?>
                <a href="<?=base_url('pemasok/data.php')?>">Pemasok</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['kasir'])) { ?>
                <a href="<?=base_url('kasir/data.php')?>">Kasir</a>
            <?php } ?>
            <?php if(isset($_SESSION['admin'])) { ?>
                <a href="<?=base_url('laporan/data.php')?>">Laporan</a>
            <?php } ?>
            <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
        </div>
    </div>
    <!-- Use any element to open/show the overlay navigation menu -->
    <button type="button" class="btn btn-primary btn-lg" onclick="openNav()">
        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
    </button>
    <div class="container-fluid">
<?php
} else {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
} ?>