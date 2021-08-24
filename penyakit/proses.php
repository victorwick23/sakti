<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama_penyakit = trim(mysqli_real_escape_string($con, $_POST['nama_penyakit']));
    $kode_icd = trim(mysqli_real_escape_string($con, $_POST['kode_icd']));
    $sql = mysqli_query($con, "INSERT INTO tb_penyakit (id_penyakit, nama_penyakit, kode_icd) VALUES ('$uuid', '$nama_penyakit', '$kode_icd')") or die (mysqli_error($con));
    if($sql){
        echo "<script>alert('Data penyakit berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data penyakit gagal ditambahkan!'); window.location='add.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_penyakit = trim(mysqli_real_escape_string($con, $_POST['nama_penyakit']));
    $kode_icd = trim(mysqli_real_escape_string($con, $_POST['kode_icd']));
    mysqli_query($con, "UPDATE tb_penyakit SET nama_penyakit = '$nama_penyakit', kode_icd = '$kode_icd' WHERE id_penyakit = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>