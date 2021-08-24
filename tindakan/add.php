<?php include_once('../_header.php');
if(isset($_SESSION['admin'])) { ?>

    <div class="box">
        <h1>Tindakan</h1>
        <h4>
            <small>Tambah Data Tindakan</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="rincian_pelayanan">Rincian Pelayanan</label>
                        <input type="text" name="rincian_pelayanan" id="rincian_pelayanan" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="harga_perda">PERDA (Rp)</label>
                        <input type="number" name="harga_perda" id="harga_perda" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan_pelayanan">Satuan</label>
                        <input type="text" name="satuan_pelayanan" id="satuan_pelayanan" class="form-control" required>
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