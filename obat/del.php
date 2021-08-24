<?php
require_once "../_config/config.php";
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) {
    mysqli_query($con, "DELETE FROM tb_obat WHERE id_obat = '$_GET[id]'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else {
    include_once('../pesan_error.php');
}
?>