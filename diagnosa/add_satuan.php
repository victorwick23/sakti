<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) {
$diag_id = $_GET['id']; ?>

    <div class="box">
        <h1>Diagnosa</h1>
        <h4>
            <small>Tambah Satuan Tindakan</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <table class="table">
                        <tr>
                            <th><center>#<center></th>
                            <th><center>Rincian Pelayanan<center></th>
                            <th><center>Satuan<center></th>
                        </tr>
                        <?php
                        $nmr = 1;
                        $sql_satuan = mysqli_query($con, "SELECT
                                                        tb_diagnosa_tindakan.id_diagnosa,
                                                        tb_diagnosa_tindakan.id_tindakan,
                                                        tb_tindakan.rincian_pelayanan
                                                        FROM tb_diagnosa_tindakan
                                                        INNER JOIN tb_tindakan ON tb_diagnosa_tindakan.id_tindakan = tb_tindakan.id_tindakan
                                                        WHERE id_diagnosa = '$diag_id' AND tb_diagnosa_tindakan.satuan = 0
                        ") or die (mysqli_error());
                        while($data_satuan = mysqli_fetch_array($sql_satuan)) { ?>
                        <tr>
                            <td><?=$nmr++?></td>
                            <td>
                                <input type="hidden" name="diagnosa_id" value="<?=$data_satuan['id_diagnosa']?>">
                                <input type="hidden" name="tindakan_id[]" value="<?=$data_satuan['id_tindakan']?>">
                                <input type="text" name="tindakan_nama[]" value="<?=$data_satuan['rincian_pelayanan']?>" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="tindakan_qty[]" class="form-control" required>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="satuan_add" value="Simpan Semua" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
} else {
    include_once('../pesan_error.php');
}
include_once('../_footer.php'); ?>