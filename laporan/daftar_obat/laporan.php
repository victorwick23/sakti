<?php
require_once "../../_config/config.php";
if(isset($_POST['simpan'])) {
    $rentang_awal = trim(mysqli_real_escape_string($con, $_POST['rentang_awal']));
    $rentang_akhir = trim(mysqli_real_escape_string($con, $_POST['rentang_akhir']));
    if($rentang_awal < $rentang_akhir) {
        $awal = $rentang_awal." "."00:00:00";
        $akhir = $rentang_akhir." "."23:59:59";
        $interval = date('d F Y', strtotime($rentang_awal))." - ".date('d F Y', strtotime($rentang_akhir));
    } else if($rentang_awal > $rentang_akhir) {
        $awal = $rentang_akhir." "."00:00:00";
        $akhir = $rentang_awal." "."23:59:59";
        $interval = date('d F Y', strtotime($rentang_akhir))." - ".date('d F Y', strtotime($rentang_awal));
    } else if($rentang_awal == $rentang_akhir) {
        $awal = $rentang_awal." "."00:00:00";
        $akhir = $rentang_akhir." "."23:59:59";
        $interval = date('d F Y', strtotime($rentang_awal));
    } else {
        echo "ERROR!!! Silahkan coba menginputkan tanggal kembali!!!";
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Obat yang Sering Digunakan</title>
    <link href="<?=base_url('laporan/daftar_obat/style_laporan.css');?>" rel="stylesheet">
</head>
<body>
    <center>
        <h1>Laporan Obat yang Sering Digunakan</h1>
        <h3>Interval : <?=$interval?></h3>
    </center>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Obat</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT
                            tb_obat.nama_obat,
                            SUM(tb_diagnosa_obat.qty) AS total
                        FROM tb_diagnosa_obat
                        INNER JOIN tb_diagnosa ON tb_diagnosa_obat.id_diagnosa = tb_diagnosa.id_diagnosa
                        INNER JOIN tb_obat ON tb_diagnosa_obat.id_obat = tb_obat.id_obat
                        INNER JOIN tb_kunjungan ON tb_diagnosa.id_kunjungan = tb_kunjungan.id_kunjungan
                        WHERE tb_kunjungan.tanggal_kunjungan >= '$awal' AND tb_kunjungan.tanggal_kunjungan <= '$akhir'
                        GROUP BY tb_diagnosa_obat.id_obat
                        ORDER BY total DESC
                        ";
            $sql = mysqli_query($con, $query) or die(mysqli_error($con));
            while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td align="center"><?=$no++."."?></td>
                    <td><?=$data['nama_obat']?></td>
                    <td><?=$data['total']?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
    <?php
    if(isset($interval)) { ?>
        <script>
            window.print();
        </script>
    <?php
    } ?>
</body>
</html>