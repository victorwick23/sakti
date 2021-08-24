<?php
require_once "../_config/config.php";
if(isset($_SESSION['admin']) || isset($_SESSION['kasir'])) {
    $total = $_GET['t'];
    $t1 = $_GET['t1'];
    $t2 = $_GET['t2'];
    if($total != 0 && $t1 != 0 && $t2 != 0){
        mysqli_query($con, "UPDATE tb_kasir SET kondisi = '2', total = '$total' WHERE id_kasir = '$_GET[id]'") or die (mysqli_error($con));
        mysqli_query($con, "UPDATE tb_kunjungan SET no_antrian = '0' WHERE id_kunjungan = '$_GET[id2]'") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    } else {
        echo "<script>window.location='data.php'; alert('Rincian biaya belum lengkap!')</script>";
    }
} else {
    include_once('../pesan_error.php');
}
?>