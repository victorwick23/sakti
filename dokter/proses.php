<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $sip = trim(mysqli_real_escape_string($con, $_POST['sip']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $sql = mysqli_query($con, "INSERT INTO tb_dokter (id_dokter, sip, nama_dokter, spesialis, alamat, no_telp) VALUES ('$uuid', '$sip', '$nama', '$spesialis', '$alamat', '$telp')") or die (mysqli_error($con));
    if($sql){
        echo "<script>alert('Data dokter berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data dokter gagal ditambahkan!'); window.location='add.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sip = trim(mysqli_real_escape_string($con, $_POST['sip']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    mysqli_query($con, "UPDATE tb_dokter SET sip = '$sip', nama_dokter = '$nama', spesialis = '$spesialis', alamat = '$alamat', no_telp = '$telp' WHERE id_dokter = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>