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
    <title>Laporan Daftar Kunjungan</title>
    <link href="<?=base_url('laporan/daftar_kunjungan/style_laporan.css');?>" rel="stylesheet">
</head>
<body>
    <center>
        <h1>Laporan Daftar Kunjungan</h1>
        <h3>Interval : <?=$interval?></h3>
    </center>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Umur</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT
                            tb_pasien.umur,
                            COUNT(tb_pasien.umur) AS total
                        FROM tb_pasien
                        INNER JOIN tb_kunjungan ON tb_pasien.id_pasien = tb_kunjungan.id_pasien
                        WHERE tb_kunjungan.tanggal_kunjungan >= '$awal' AND tb_kunjungan.tanggal_kunjungan <= '$akhir'
                        GROUP BY tb_pasien.umur
                        ORDER BY umur ASC
                        ";
            $sql = mysqli_query($con, $query) or die(mysqli_error($con));
            while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td align="center"><?=$no++."."?></td>
                    <td><?=$data['umur']?></td>
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