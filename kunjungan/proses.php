<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $no_rm = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $poli_tujuan = trim(mysqli_real_escape_string($con, $_POST['poli_tujuan']));
    $no_antrian = trim(mysqli_real_escape_string($con, $_POST['no_antrian']));
    $tglkunjungan = trim(mysqli_real_escape_string($con, $_POST['tglkunjungan']));
    $tglfinal = date($tglkunjungan.' '.'H:i:s');
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $status = trim(mysqli_real_escape_string($con, $_POST['status']));
    $sql_cek_antrian = mysqli_query($con, "SELECT * FROM tb_kunjungan WHERE no_antrian = '$no_antrian'") or die(mysqli_error($con));
    if(mysqli_num_rows($sql_cek_antrian) > 0) {
        echo "<script>alert('Nomor Antrian Sudah Digunakan Pasien Lain!'); window.location='add.php';</script>";
    } else {
        $sql = mysqli_query($con, "INSERT INTO tb_kunjungan (id_kunjungan, id_pasien, id_poli, no_antrian, tanggal_kunjungan, keluhan, status) VALUES ('$uuid', '$no_rm', '$poli_tujuan', '$no_antrian', '$tglfinal', '$keluhan', '$status')") or die (mysqli_error($con));
        if($sql){
            echo "<script>alert('Data antrian berhasil ditambahkan!'); window.location='data.php';</script>";
        } else {
            echo "<script>alert('Data antrian gagal ditambahkan!'); window.location='add.php';</script>";
        }
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_rm = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $poli_tujuan = trim(mysqli_real_escape_string($con, $_POST['poli_tujuan']));
    $no_antrian = trim(mysqli_real_escape_string($con, $_POST['no_antrian']));
    $tglkunjungan = trim(mysqli_real_escape_string($con, $_POST['tglkunjungan']));
    $tglfinal = date($tglkunjungan.' '.'H:i:s');
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $status = trim(mysqli_real_escape_string($con, $_POST['status']));
    $sql_cek_antrian = mysqli_query($con, "SELECT * FROM tb_kunjungan WHERE no_antrian = '$no_antrian' AND id_kunjungan != '$id'") or die(mysqli_error($con));
    if(mysqli_num_rows($sql_cek_antrian) > 0) {
        echo "<script>alert('Nomor Antrian Sudah Digunakan Pasien Lain!'); window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_kunjungan SET id_pasien = '$no_rm', id_poli = '$poli_tujuan', no_antrian = '$no_antrian', tanggal_kunjungan = '$tglfinal', keluhan = '$keluhan', status = '$status' WHERE id_kunjungan = '$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    }
} 
?>