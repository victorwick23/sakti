<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $obat_nama = trim(mysqli_real_escape_string($con, $_POST['obat_nama']));
    $pemasok_nama = trim(mysqli_real_escape_string($con, $_POST['pemasok_nama']));
    $tglmasuk = trim(mysqli_real_escape_string($con, $_POST['tglmasuk']));
    $tglfinal = date($tglmasuk.' '.'H:i:s');

    $ambil_stok = mysqli_query($con, "SELECT stok FROM tb_obat WHERE id_obat = '$obat_nama'") or die (mysqli_error($con));
    $data_ambil_stok = mysqli_fetch_array($ambil_stok);
    $stok_awal = $data_ambil_stok['stok'];

    $penambahan_stok = trim(mysqli_real_escape_string($con, $_POST['penambahan_stok']));

    $stok_akhir = $stok_awal + $penambahan_stok;

    $sql_ke_op = mysqli_query($con, "INSERT INTO tb_obat_pemasok (id_op, id_obat, id_pemasok, tgl_masuk, stok_awal, penambahan) VALUES ('$uuid', '$obat_nama', '$pemasok_nama', '$tglfinal', '$stok_awal', '$penambahan_stok')") or die (mysqli_error($con));
    $sql_ke_ob = mysqli_query($con, "UPDATE tb_obat SET stok = '$stok_akhir' WHERE id_obat = '$obat_nama'") or die (mysqli_error($con));
    if($sql_ke_op && $sql_ke_ob){
        echo "<script>alert('Stok obat berhasil ditambahkan!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Stok obat gagal ditambahkan!'); window.location='add.php';</script>";
    }
}
?>