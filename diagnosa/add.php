<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>
<link rel="stylesheet" href="<?=base_url('_assets/boot341/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?=base_url('_assets/libs/bootstrapSelectYa/dist/css/bootstrap-select.css');?>">

    <div class="box">
        <h1>Diagnosa</h1>
        <h4>
            <small>Tambah Data Diagnosa</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="kunjungan_id">Nomor Rekam Medik</label>
                        <select name="kunjungan_id" id="kunjungan_id" class="selectpicker form-control" data-live-search="true" required>
                            <option value="">- Pilih No. Rekam Medik -</option>
                            <?php
                            $pasien_sql = mysqli_query($con, "SELECT * FROM tb_pasien INNER JOIN tb_kunjungan ON tb_pasien.id_pasien = tb_kunjungan.id_pasien WHERE no_antrian != '0' ORDER BY no_rekam_medik") or die (mysqli_error($con));
                            while($data_pasien = mysqli_fetch_array($pasien_sql)) {
                                echo '<option value="'.$data_pasien['id_kunjungan'].'">'.$data_pasien['no_rekam_medik'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokter_id">Nama Dokter</label>
                        <select name="dokter_id" id="dokter_id" class="selectpicker form-control" data-live-search="true" required>
                            <option value="">- Pilih Nama Dokter -</option>
                            <?php
                            $dokter_sql = mysqli_query($con, "SELECT * FROM tb_dokter ORDER BY nama_dokter") or die (mysqli_error($con));
                            while($data_dokter = mysqli_fetch_array($dokter_sql)) {
                                echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penyakit_id">Diagnosa</label>
                        <select name="penyakit_id[]" id="penyakit_id" class="selectpicker form-control" data-live-search="true" multiple required>
                            <?php
                            $penyakit_sql = mysqli_query($con, "SELECT * FROM tb_penyakit ORDER BY nama_penyakit") or die (mysqli_error($con));
                            while($data_penyakit = mysqli_fetch_array($penyakit_sql)) {
                                echo '<option value="'.$data_penyakit['id_penyakit'].'">'.$data_penyakit['nama_penyakit'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="obat_id">Obat</label>
                        <select name="obat_id[]" id="obat_id" class="selectpicker form-control" data-live-search="true" multiple required>
                            <?php
                            $obat_sql = mysqli_query($con, "SELECT * FROM tb_obat ORDER BY nama_obat") or die (mysqli_error($con));
                            while($data_obat = mysqli_fetch_array($obat_sql)) {
                                echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aturan_pakai">Aturan Pakai</label>
                        <textarea name="aturan_pakai" id="aturan_pakai" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tindakan_id">Tindakan</label>
                        <select name="tindakan_id[]" id="tindakan_id" class="selectpicker form-control" data-live-search="true" multiple required>
                            <?php
                            $tindakan_sql = mysqli_query($con, "SELECT * FROM tb_tindakan ORDER BY rincian_pelayanan") or die (mysqli_error($con));
                            while($data_tindakan = mysqli_fetch_array($tindakan_sql)) {
                                echo '<option value="'.$data_tindakan['id_tindakan'].'">'.$data_tindakan['rincian_pelayanan'].'</option>';
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