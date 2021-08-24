<?php
require_once "../_config/config.php";
if(isset($_SESSION['admin'])) {
    mysqli_query($con, "DELETE FROM tb_dokter WHERE id_dokter = '$_GET[id]'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else {
    include_once('../pesan_error.php');
}
?>