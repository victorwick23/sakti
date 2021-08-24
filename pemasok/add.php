<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['apoteker'])) { ?>

    <div class="box">
        <h1>Pemasok</h1>
        <h4>
            <small>Tambah Data Pemasok</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama_pemasok">Nama Pemasok</label>
                        <input type="text" name="nama_pemasok" id="nama_pemasok" class="form-control" required>
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