<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['obat_nama']));
    $stok = 0;
    $harga = trim(mysqli_real_escape_string($con, $_POST['obat_harga']));
    $kadaluarsa = trim(mysqli_real_escape_string($con, $_POST['kadaluarsa']));
    $sql = mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, stok, harga, exp_date) VALUES ('$uuid', '$nama', '$stok', '$harga', '$kadaluarsa')") or die (mysqli_error($con));
    if($sql){
        echo "<script>alert('Data obat berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data obat gagal ditambahkan!'); window.location='add.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['obat_nama']));
    $harga = trim(mysqli_real_escape_string($con, $_POST['obat_harga']));
    $kadaluarsa = trim(mysqli_real_escape_string($con, $_POST['kadaluarsa']));
    mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', harga = '$harga', exp_date = '$kadaluarsa' WHERE id_obat = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} 
?>