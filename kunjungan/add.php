<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter']) || isset($_SESSION['kasir'])) {
    $sql_antrian = mysqli_query($con, "SELECT * FROM tb_kunjungan ORDER BY no_antrian DESC LIMIT 1") or die (mysqli_error($con));
    $data_antrian = mysqli_fetch_array($sql_antrian);
    if(mysqli_num_rows($sql_antrian) > 0){
        $antrian_no = $data_antrian['no_antrian'] + 1;
    } else{
        $antrian_no = 1;
    }
?>
<link rel="stylesheet" href="<?=base_url('_assets/boot341/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?=base_url('_assets/libs/bootstrapSelectYa/dist/css/bootstrap-select.css');?>">

    <div class="box">
        <h1>Kunjungan</h1>
        <h4>
            <small>Tambah Antrian</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="tglkunjungan">Tanggal Kunjungan</label>
                        <input type="date" name="tglkunjungan" id="tglkunjungan" value="<?=date('Y-m-d')?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Mendaftar Sebagai :</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value="Umum" required> Pasien Umum
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="BPJS"> Pasien BPJS
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_antrian">Nomor Antrian</label>
                        <input type="number" name="no_antrian" id="no_antrian" class="form-control" value="<?=$antrian_no?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_rm">Nomor Rekam Medik</label>
                        <select name="no_rm" id="no_rm" class="selectpicker form-control" data-live-search="true" required>
                            <option value="">- Pilih No. Rekam Medik -</option>
                            <?php
                            $pasien_sql = mysqli_query($con, "SELECT * FROM tb_pasien ORDER BY no_rekam_medik ASC") or die (mysqli_error($con));
                            while($data_pasien = mysqli_fetch_array($pasien_sql)) {
                                echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['no_rekam_medik'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="poli_tujuan">Poli Tujuan</label>
                        <select name="poli_tujuan" id="poli_tujuan" class="form-control" required>
                            <option value="">- Pilih Poli Tujuan -</option>
                            <?php
                            $sql_tujuan = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die (mysqli_error($con));
                            while($data_poli = mysqli_fetch_array($sql_tujuan)) {
                                echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                            } ?>
                        </select>
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