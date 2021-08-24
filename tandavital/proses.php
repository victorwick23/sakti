<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $kunjungan_id = trim(mysqli_real_escape_string($con, $_POST['kunjungan_id']));
    $berat = trim(mysqli_real_escape_string($con, $_POST['berat']));
    $tinggi = trim(mysqli_real_escape_string($con, $_POST['tinggi']));
    $perut = trim(mysqli_real_escape_string($con, $_POST['perut']));
    $suhu = trim(mysqli_real_escape_string($con, $_POST['suhu']));
    $tensi = trim(mysqli_real_escape_string($con, $_POST['tensi']));
    $nadi = trim(mysqli_real_escape_string($con, $_POST['nadi']));
    $pernafasan = trim(mysqli_real_escape_string($con, $_POST['pernafasan']));
    $sql = mysqli_query($con, "INSERT INTO tb_tandavital (id_vital, id_kunjungan, berat, tinggi, lingkar_perut, suhu, tensi, nadi, pernafasan) VALUES ('$uuid', '$kunjungan_id', '$berat', '$tinggi', '$perut', '$suhu', '$tensi', '$nadi', '$pernafasan')") or die (mysqli_error($con));
    if($sql){
        echo "<script>alert('Data tanda vital berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data tanda vital gagal ditambahkan!'); window.location='add.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kunjungan_id = trim(mysqli_real_escape_string($con, $_POST['kunjungan_id']));
    $berat = trim(mysqli_real_escape_string($con, $_POST['berat']));
    $tinggi = trim(mysqli_real_escape_string($con, $_POST['tinggi']));
    $perut = trim(mysqli_real_escape_string($con, $_POST['perut']));
    $suhu = trim(mysqli_real_escape_string($con, $_POST['suhu']));
    $tensi = trim(mysqli_real_escape_string($con, $_POST['tensi']));
    $nadi = trim(mysqli_real_escape_string($con, $_POST['nadi']));
    $pernafasan = trim(mysqli_real_escape_string($con, $_POST['pernafasan']));
    mysqli_query($con, "UPDATE tb_tandavital SET id_kunjungan = '$kunjungan_id', berat = '$berat', tinggi = '$tinggi', lingkar_perut = '$perut', suhu = '$suhu', tensi = '$tensi', nadi = '$nadi', pernafasan = '$pernafasan' WHERE id_vital = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} 
?>