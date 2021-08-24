<?php include_once('../_header.php'); 
if(isset($_SESSION['admin']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter'])) { ?>

    <div class="box">
        <h1>Rekam Medis</h1>
        <h4>
            <small>Data Rekam Medis</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed" id="rekammedis">
                <thead>
                    <tr class="info">
                        <th><center>Waktu</center></th>
                        <th><center>No. Rekam Medik</center></th>
                        <th><center>Nama Pasien</center></th>
                        <th><center>Keluhan</center></th>
                        <th><center>Diagnosa</center></th>
                        <th><center>Obat</center></th>
                        <th><center>Qty</center></th>
                        <th><center>Aturan Pakai</center></th>
                        <th><center>Tindakan</center></th>
                        <th><center>Satuan</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT
                                    tb_diagnosa.id_diagnosa,
                                    tb_kunjungan.tanggal_kunjungan,
                                    tb_pasien.no_rekam_medik,
                                    tb_pasien.nama_pasien,
                                    tb_diagnosa.keluhan_akhir,
                                    tb_diagnosa.aturan_pakai
                                FROM tb_diagnosa
                                INNER JOIN tb_kunjungan ON tb_diagnosa.id_kunjungan = tb_kunjungan.id_kunjungan
                                INNER JOIN tb_pasien ON tb_kunjungan.id_pasien = tb_pasien.id_pasien
                    ";
                    $sql_diag = mysqli_query($con, $query) or die(mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_diag)) { ?>
                        <tr>
                            <td><?=$data['tanggal_kunjungan']?></td>
                            <td><?=$data['no_rekam_medik']?></td>
                            <td><?=$data['nama_pasien']?></td>
                            <td><?=$data['keluhan_akhir']?></td>
                            <td>
                                <?php
                                $nomor = 1;
                                $sql_penyakit = mysqli_query($con, "SELECT * FROM tb_diagnosa_penyakit
                                                                    INNER JOIN tb_penyakit ON tb_diagnosa_penyakit.id_penyakit = tb_penyakit.id_penyakit
                                                                    WHERE id_diagnosa = '$data[id_diagnosa]'") or die(mysqli_error($con));
                                while ($data_penyakit = mysqli_fetch_array($sql_penyakit)) {
                                    echo $nomor++.". ".$data_penyakit['nama_penyakit']."<br>";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $nmr = 1;
                                $sql_obat = mysqli_query($con, "SELECT * FROM tb_diagnosa_obat
                                                                    INNER JOIN tb_obat ON tb_diagnosa_obat.id_obat = tb_obat.id_obat
                                                                    WHERE id_diagnosa = '$data[id_diagnosa]'") or die(mysqli_error($con));
                                while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                    echo $nmr++.". ".$data_obat['nama_obat']."<br>";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $nmr = 1;
                                $sql_obat = mysqli_query($con, "SELECT * FROM tb_diagnosa_obat
                                                                    WHERE id_diagnosa = '$data[id_diagnosa]'") or die(mysqli_error($con));
                                while ($data_qty = mysqli_fetch_array($sql_obat)) {
                                    echo $nmr++.". ".$data_qty['qty']."<br>";
                                } ?>
                            </td>
                            <td><?=$data['aturan_pakai']?></td>
                            <td>
                                <?php
                                $penomoran = 1;
                                $sql_tindakan = mysqli_query($con, "SELECT * FROM tb_diagnosa_tindakan
                                                                    INNER JOIN tb_tindakan ON tb_diagnosa_tindakan.id_tindakan = tb_tindakan.id_tindakan
                                                                    WHERE id_diagnosa = '$data[id_diagnosa]'") or die(mysqli_error($con));
                                while ($data_tindakan = mysqli_fetch_array($sql_tindakan)) {
                                    echo $penomoran++.". ".$data_tindakan['rincian_pelayanan']."<br>";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $angka_nomor = 1;
                                $sql_satuan = mysqli_query($con, "SELECT * FROM tb_diagnosa_tindakan
                                                                    WHERE id_diagnosa = '$data[id_diagnosa]'") or die(mysqli_error($con));
                                while ($data_satuan = mysqli_fetch_array($sql_satuan)) {
                                    echo $angka_nomor++.". ".$data_satuan['satuan']."<br>";
                                } ?>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#rekammedis').DataTable( {
                columnDefs : [
                    {
                    }
                ],
                "order" : [0, "desc"]
            } );
        } );
        </script>
    </div>

<?php
} else {
    include_once('../pesan_error.php');
} 
include_once('../_footer.php'); ?>