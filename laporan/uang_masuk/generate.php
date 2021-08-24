<?php include_once('../../_header.php'); ?>

    <div class="box">
        <h1>Laporan Uang Masuk</h1>
        <h4>
            <small>Silahkan pilih rentang waktu!</small>
            <div class="pull-right">
                <a href="../data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="laporan.php" method="post" target="_blank">
                    <div class="form-group">
                        <label for="rentang_awal">Rentang Awal</label>
                        <input type="date" name="rentang_awal" id="rentang_awal" value="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="rentang_akhir">Rentang Akhir</label>
                        <input type="date" name="rentang_akhir" id="rentang_akhir" value="<?=date('Y-m-d')?>" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../../_footer.php'); ?>