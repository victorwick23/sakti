<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $uuid_kasir = Uuid::uuid4()->toString();
    $kunjungan_id = trim(mysqli_real_escape_string($con, $_POST['kunjungan_id'])); 
    $dokter_id = trim(mysqli_real_escape_string($con, $_POST['dokter_id']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $aturan_pakai = trim(mysqli_real_escape_string($con, $_POST['aturan_pakai']));
    mysqli_query($con, "INSERT INTO tb_diagnosa (id_diagnosa, id_kunjungan, id_dokter, keluhan_akhir, aturan_pakai) VALUES ('$uuid', '$kunjungan_id', '$dokter_id', '$keluhan', '$aturan_pakai')") or die (mysqli_error($con));
    
    $penyakit_id = $_POST['penyakit_id'];
    foreach ($penyakit_id as $penyakit) {
        mysqli_query($con, "INSERT INTO tb_diagnosa_penyakit (id_diagnosa, id_penyakit) VALUES ('$uuid', '$penyakit')") or die (mysqli_error($con));
    }

    $obat_id = $_POST['obat_id'];
    foreach ($obat_id as $obt) {
        mysqli_query($con, "INSERT INTO tb_diagnosa_obat (id_diagnosa, id_obat) VALUES ('$uuid', '$obt')") or die (mysqli_error($con));
    }

    $tindakan_id = $_POST['tindakan_id'];
    foreach ($tindakan_id as $tndkn) {
        mysqli_query($con, "INSERT INTO tb_diagnosa_tindakan (id_diagnosa, id_tindakan) VALUES ('$uuid', '$tndkn')") or die (mysqli_error($con));
    }

    mysqli_query($con, "INSERT INTO tb_kasir (id_kasir, id_kunjungan, id_diagnosa, total, kondisi) VALUES ('$uuid_kasir', '$kunjungan_id', '$uuid', '0', '1')") or die (mysqli_error($con));

    echo "<script>window.location='data.php'; alert('Data berhasil ditambahkan!')</script>";
} else if(isset($_POST['qty_add'])) {
    if(isset($_POST['obat_id'])){
        for ($i=0; $i < count($_POST['obat_id']); $i++) {
            $id_diagnosa = $_POST['diagnosa_id'];
            $id_obat = $_POST['obat_id'][$i];
            $qty = $_POST['obat_qty'][$i];
            $ambil_stok = mysqli_query($con, "SELECT stok FROM tb_obat WHERE id_obat = '$id_obat'") or die (mysqli_error($con));
            $data_stok = mysqli_fetch_array($ambil_stok);
            $stok_awal = $data_stok['stok'];
            $stok_akhir = $stok_awal - $qty;
            if($stok_akhir >= 0){
                mysqli_query($con, "UPDATE tb_diagnosa_obat SET qty = '$qty' WHERE id_diagnosa = '$id_diagnosa' AND id_obat = '$id_obat'") or die (mysqli_error($con));
                mysqli_query($con, "UPDATE tb_obat SET stok = '$stok_akhir' WHERE id_obat = '$id_obat'") or die (mysqli_error($con));
                echo "<script>window.location='data.php'; alert('Data berhasil ditambahkan!')</script>";
            } else {
                echo "<script>window.location='data.php'; alert('Kekurangan stok obat! silahkan cek stok obat!')</script>";
            }
        }
    } else {
        echo "<script>window.location='data.php'; alert('Tidak ada data yang tersimpan!')</script>";
    }
} else if(isset($_POST['satuan_add'])) {
    if(isset($_POST['tindakan_id'])) {
        for ($i=0; $i < count($_POST['tindakan_id']); $i++) {
            $id_diagnosa = $_POST['diagnosa_id'];
            $id_tindakan = $_POST['tindakan_id'][$i];
            $satuan = $_POST['tindakan_qty'][$i];
            $sql = mysqli_query($con, "UPDATE tb_diagnosa_tindakan SET satuan = '$satuan' WHERE id_diagnosa = '$id_diagnosa' AND id_tindakan = '$id_tindakan'") or die (mysqli_error($con));
            if($sql) {
                echo "<script>window.location='data.php'; alert('Data berhasil ditambahkan!')</script>";
            } else {
                echo "<script>window.location='data.php'; alert('Data gagal ditambahkan!')</script>";
            }
        }
    } else {
        echo "<script>window.location='data.php'; alert('Tidak ada data yang tersimpan!')</script>";
    }
}
?>