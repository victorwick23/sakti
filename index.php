<?php
require_once "_config/config.php";
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker']) || isset($_SESSION['perawat']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['kasir'])) {
    echo "<script>window.location='".base_url('dashboard')."';</script>";
} else{
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>