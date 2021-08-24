<?php include_once('../_header.php'); 
if(isset($_SESSION['admin']) || isset($_SESSION['kasir'])) { ?>

    <div class="box">
        <h1>Kasir</h1>
        <h4>
            <small>Data Kasir</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="kasir">
                <thead>
                    <tr>
                        <th><center>Waktu</center></th>
                        <th><center>No. Rekam Medik</center></th>
                        <th><center>Nama Pasien</center></th>
                        <th><center>Status</center></th>
                        <th><center>Rincian Biaya</center></th>
                        <th><center><i class="glyphicon glyphicon-th-large"></i></center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT
                                    tb_kasir.id_kasir,
                                    tb_kunjungan.id_kunjungan,
                                    tb_diagnosa.id_diagnosa,
                                    tb_kunjungan.tanggal_kunjungan,
                                    tb_pasien.no_rekam_medik,
                                    tb_pasien.nama_pasien,
                                    tb_kunjungan.status,
                                    tb_kasir.kondisi
                                FROM tb_kasir
                                INNER JOIN tb_diagnosa ON tb_kasir.id_diagnosa = tb_diagnosa.id_diagnosa
                                INNER JOIN tb_kunjungan ON tb_kasir.id_kunjungan = tb_kunjungan.id_kunjungan
                                INNER JOIN tb_pasien ON tb_kunjungan.id_pasien = tb_pasien.id_pasien
                    ";
                    $sql_kasir = mysqli_query($con, $query) or die(mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_kasir)) { ?>
                        <tr>
                            <td><?=$data['tanggal_kunjungan']?></td>
                            <td><?=$data['no_rekam_medik']?></td>
                            <td><?=$data['nama_pasien']?></td>
                            <td><?=$data['status']?></td>
                            <td>
                                <?php
                                $penomoran = 1;
                                $nomoran = 1;
                                $totaltindakan = 0;
                                $totalobat = 0;
                                $sql_tindakan = mysqli_query($con, "SELECT
                                                                        tb_tindakan.rincian_pelayanan,
                                                                        tb_tindakan.perda,
                                                                        tb_diagnosa_tindakan.satuan
                                                                    FROM tb_diagnosa_tindakan
                                                                    INNER JOIN tb_tindakan ON tb_diagnosa_tindakan.id_tindakan = tb_tindakan.id_tindakan
                                                                    WHERE id_diagnosa = '$data[id_diagnosa]'") or die(mysqli_error($con));
                                while ($data_tindakan = mysqli_fetch_array($sql_tindakan)) {
                                    $temp1 = $data_tindakan['satuan'] * $data_tindakan['perda'];
                                    $totaltindakan = $totaltindakan + $temp1;
                                    echo $penomoran++.". ".$data_tindakan['rincian_pelayanan']." :"."<br>";
                                    echo number_format($data_tindakan['perda'],0,'','.')." x ".$data_tindakan['satuan']." = ".number_format($temp1,0,'','.')."<br>";
                                }
                                echo "Total Biaya Tindakan : ".number_format($totaltindakan,0,'','.')."<br>";
                                echo "-------------------+"."<br>";

                                $sql_obat = mysqli_query($con, "SELECT
                                                                        tb_obat.nama_obat,
                                                                        tb_obat.harga,
                                                                        tb_diagnosa_obat.qty
                                                                    FROM tb_diagnosa_obat
                                                                    INNER JOIN tb_obat ON tb_diagnosa_obat.id_obat = tb_obat.id_obat
                                                                    WHERE id_diagnosa = '$data[id_diagnosa]'") or die(mysqli_error($con));
                                while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                    $temp2 = $data_obat['qty'] * $data_obat['harga'];
                                    $totalobat = $totalobat + $temp2;
                                    echo $nomoran++.". ".$data_obat['nama_obat']." :"."<br>";
                                    echo number_format($data_obat['harga'],0,'','.')." x ".$data_obat['qty']." = ".number_format($temp2,0,'','.')."<br>";
                                }
                                echo "Total Biaya Obat : ".number_format($totalobat,0,'','.')."<br>";
                                echo "-------------------+"."<br>";

                                $totalsemua = $totaltindakan + $totalobat;
                                echo "Total semuanya : "."Rp".number_format($totalsemua,0,'','.');
                                ?>
                            </td>
                            <td>
                                <?php
                                if($data['kondisi'] == 1){ ?>
                                    <span class="label label-danger">Belum Bayar</span>
                                <?php
                                } else if($data['kondisi'] == 2){ ?>
                                    <span class="label label-success">Sudah Bayar</span>
                                <?php
                                } else {
                                    echo "ERROR!";
                                }
                                ?>
                            </td>
                            <td>
                                <center>
                                    <a href="rubah_kondisi.php?id=<?=$data['id_kasir']?>&id2=<?=$data['id_kunjungan']?>&t=<?=$totalsemua?>&t1=<?=$totaltindakan?>&t2=<?=$totalobat?>"  class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></a>
                                </center>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#kasir').DataTable( {
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [6]
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