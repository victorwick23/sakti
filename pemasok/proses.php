<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama_pemasok']));
    $sql = mysqli_query($con, "INSERT INTO tb_pemasok (id_pemasok, nama_pemasok) VALUES ('$uuid', '$nama')") or die (mysqli_error($con));
    if($sql){
        echo "<script>alert('Data pemasok berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data pemasok gagal ditambahkan!'); window.location='add.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama_pemasok']));
    mysqli_query($con, "UPDATE tb_pemasok SET nama_pemasok = '$nama' WHERE id_pemasok = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>