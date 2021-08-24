<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['apoteker'])) { ?>
<link rel="stylesheet" href="<?=base_url('_assets/boot341/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?=base_url('_assets/libs/bootstrapSelectYa/dist/css/bootstrap-select.css');?>">

    <div class="box">
        <h1>Obat</h1>
        <h4>
            <small>Tambah Stok Obat</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="obat_nama">Nama Obat</label>
                        <select name="obat_nama" id="obat_nama" class="selectpicker form-control" data-live-search="true" required>
                            <option value="">- Pilih Obat -</option>
                            <?php
                            $sql_stok = mysqli_query($con, "SELECT * FROM tb_obat ORDER BY nama_obat ASC") or die (mysqli_error($con));
                            while($data_stok = mysqli_fetch_array($sql_stok)) {
                                echo '<option value="'.$data_stok['id_obat'].'">'.$data_stok['nama_obat'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pemasok_nama">Nama Pemasok</label>
                        <select name="pemasok_nama" id="pemasok_nama" class="selectpicker form-control" data-live-search="true" required>
                            <option value="">- Pilih Pemasok -</option>
                            <?php
                            $sql_pemasok = mysqli_query($con, "SELECT * FROM tb_pemasok ORDER BY nama_pemasok ASC") or die (mysqli_error($con));
                            while($data_pemasok = mysqli_fetch_array($sql_pemasok)) {
                                echo '<option value="'.$data_pemasok['id_pemasok'].'">'.$data_pemasok['nama_pemasok'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penambahan_stok">Penambahan Stok Obat</label>
                        <input type="number" name="penambahan_stok" id="penambahan_stok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tglmasuk">Tanggal Masuk</label>
                        <input type="date" name="tglmasuk" id="tglmasuk" value="<?=date('Y-m-d')?>" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Tambah" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="<?=base_url('_assets/boot341/jquery-3.5.1.min.js')?>"></script>
<script src="<?=base_url('_assets/boot341/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('_assets/libs/bootstrapSelectYa/dist/js/bootstrap-select.js')?>"></script>
<?php
} else {
    include_once('../pesan_error.php');
}
include_once('../_footer.php'); ?>