<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $norekammedik = trim(mysqli_real_escape_string($con, $_POST['no_rekammedik'])); 
    $nik = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nobpjs = trim(mysqli_real_escape_string($con, $_POST['bpjs']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $ttl = trim(mysqli_real_escape_string($con, $_POST['ttl']));
    $umur = trim(mysqli_real_escape_string($con, $_POST['umur']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nik = '$nik'") or die(mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nomor Induk Kependudukan Sudah Pernah Diinput!'); window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, no_rekam_medik, nik, no_bpjs, nama_pasien, jenis_kelamin, ttl, umur, alamat, no_telp) VALUES ('$uuid', '$norekammedik', '$nik', '$nobpjs', '$nama', '$jk', '$ttl', '$umur', '$alamat', '$telp')") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $norekammedik = trim(mysqli_real_escape_string($con, $_POST['no_rekammedik']));
    $nik = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nobpjs = trim(mysqli_real_escape_string($con, $_POST['bpjs']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $ttl = trim(mysqli_real_escape_string($con, $_POST['ttl']));
    $umur = trim(mysqli_real_escape_string($con, $_POST['umur']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nik = '$nik' AND id_pasien != '$id'") or die(mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nomor Induk Kependudukan Sudah Pernah Diinput!'); window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_pasien SET no_rekam_medik = '$norekammedik', nik = '$nik', no_bpjs = '$nobpjs', nama_pasien = '$nama', jenis_kelamin = '$jk', ttl = '$ttl', umur = '$umur', alamat = '$alamat', no_telp = '$telp' WHERE id_pasien = '$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    }
}
?>