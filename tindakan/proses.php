<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $rincian_pelayanan = trim(mysqli_real_escape_string($con, $_POST['rincian_pelayanan']));
    $harga_perda = trim(mysqli_real_escape_string($con, $_POST['harga_perda']));
    $satuan_pelayanan = trim(mysqli_real_escape_string($con, $_POST['satuan_pelayanan']));
    $sql = mysqli_query($con, "INSERT INTO tb_tindakan (id_tindakan, rincian_pelayanan, perda, satuan) VALUES ('$uuid', '$rincian_pelayanan', '$harga_perda', '$satuan_pelayanan')") or die (mysqli_error($con));
    if($sql){
        echo "<script>alert('Data tindakan berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data tindakan gagal ditambahkan!'); window.location='add.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $rincian_pelayanan = trim(mysqli_real_escape_string($con, $_POST['rincian_pelayanan']));
    $harga_perda = trim(mysqli_real_escape_string($con, $_POST['harga_perda']));
    $satuan_pelayanan = trim(mysqli_real_escape_string($con, $_POST['satuan_pelayanan']));
    mysqli_query($con, "UPDATE tb_tindakan SET rincian_pelayanan = '$rincian_pelayanan', perda = '$harga_perda', satuan = '$satuan_pelayanan' WHERE id_tindakan = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} 
?>