<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>

    <div class="box">
        <h1>Penyakit</h1>
        <h4>
            <small>Tambah Data Penyakit</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama_penyakit">Nama Penyakit</label>
                        <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="kode_icd">Kode ICD 10</label>
                        <input type="text" name="kode_icd" id="kode_icd" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
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