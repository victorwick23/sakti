<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { 
$diag_id = $_GET['id']; ?>

    <div class="box">
        <h1>Diagnosa</h1>
        <h4>
            <small>Tambah Qty Obat</small>
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
                            <th><center>Nama Obat<center></th>
                            <th><center>Qty<center></th>
                        </tr>
                        <?php
                        $no = 1;
                        $sql_qty = mysqli_query($con, "SELECT
                                                        tb_diagnosa_obat.id_diagnosa,
                                                        tb_diagnosa_obat.id_obat,
                                                        tb_obat.nama_obat
                                                        FROM tb_diagnosa_obat
                                                        INNER JOIN tb_obat ON tb_diagnosa_obat.id_obat = tb_obat.id_obat
                                                        WHERE id_diagnosa = '$diag_id' AND qty = 0
                        ") or die (mysqli_error());
                        while($data = mysqli_fetch_array($sql_qty)) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <input type="hidden" name="diagnosa_id" value="<?=$data['id_diagnosa']?>">
                                <input type="hidden" name="obat_id[]" value="<?=$data['id_obat']?>">
                                <input type="text" name="obat_nama[]" value="<?=$data['nama_obat']?>" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="obat_qty[]" class="form-control" required>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="qty_add" value="Simpan Semua" class="btn btn-success">
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