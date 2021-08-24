<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>

    <div class="box">
        <h1>Obat</h1>
        <h4>
            <small>Edit Data Obat</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $obatsql = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($obatsql);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="obat_nama">Nama Obat</label>
                        <input type="hidden" name="id" value="<?=$data['id_obat']?>">
                        <input type="text" name="obat_nama" id="obat_nama" class="form-control" value="<?=$data['nama_obat']?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="obat_harga">Harga</label>
                        <input type="number" name="obat_harga" id="obat_harga" class="form-control" value="<?=$data['harga']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kadaluarsa">Exp Date</label>
                        <input type="date" name="kadaluarsa" id="kadaluarsa" class="form-control" value="<?=$data['exp_date']?>" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
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