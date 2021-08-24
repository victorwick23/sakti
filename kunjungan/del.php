<?php
require_once "../_config/config.php";
if(isset($_SESSION['admin']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter']) || isset($_SESSION['kasir'])) {
    mysqli_query($con, "UPDATE tb_kunjungan SET no_antrian = '0' WHERE id_kunjungan = '$_GET[id]'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else {
    include_once('../pesan_error.php');
}
?>