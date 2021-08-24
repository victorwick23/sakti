<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter'])) { ?>
<link rel="stylesheet" href="<?=base_url('_assets/boot341/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?=base_url('_assets/libs/bootstrapSelectYa/dist/css/bootstrap-select.css');?>">

    <div class="box">
        <h1>Tanda Vital</h1>
        <h4>
            <small>Edit Data Tanda Vital</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $vitalsql = mysqli_query($con, "SELECT * FROM tb_tandavital WHERE id_vital = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($vitalsql);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="kunjungan_id">Nomor Rekam Medik</label>
                        <select name="kunjungan_id" id="kunjungan_id" class="selectpicker form-control" data-live-search="true" required>
                            <option value="">- Pilih No. Rekam Medik -</option>
                            <?php
                            $pasien_sql = mysqli_query($con, "SELECT * FROM tb_pasien INNER JOIN tb_kunjungan ON tb_pasien.id_pasien = tb_kunjungan.id_pasien WHERE no_antrian != '0'") or die (mysqli_error($con));
                            while($data_pasien = mysqli_fetch_array($pasien_sql)) { ?>
                                <option value="<?=$data_pasien['id_kunjungan']?>" <?=$data['id_kunjungan'] == $data_pasien['id_kunjungan'] ? "selected" : null ?>><?=$data_pasien['no_rekam_medik']?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat Badan</label>
                        <input type="text" name="berat" id="berat" class="form-control" value="<?=$data['berat']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tinggi">Tinggi Badan</label>
                        <input type="text" name="tinggi" id="tinggi" class="form-control" value="<?=$data['tinggi']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="perut">Lingkar Perut</label>
                        <input type="text" name="perut" id="perut" class="form-control" value="<?=$data['lingkar_perut']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="suhu">Suhu</label>
                        <input type="text" name="suhu" id="suhu" class="form-control" value="<?=$data['suhu']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tensi">Tensi</label>
                        <input type="text" name="tensi" id="tensi" class="form-control" value="<?=$data['tensi']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nadi">Nadi</label>
                        <input type="text" name="nadi" id="nadi" class="form-control" value="<?=$data['nadi']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pernafasan">RR</label>
                        <input type="text" name="pernafasan" id="pernafasan" class="form-control" value="<?=$data['pernafasan']?>" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
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