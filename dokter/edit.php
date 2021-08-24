<?php include_once('../_header.php');
if(isset($_SESSION['admin'])) { ?>

    <div class="box">
        <h1>Dokter</h1>
        <h4>
            <small>Edit Data Dokter</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $doktersql = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die (mysqli_error($con));
                $dokterdata = mysqli_fetch_array($doktersql);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="sip">Nomor SIP</label>
                        <input type="hidden" name="id" value="<?=$dokterdata['id_dokter']?>">
                        <input type="text" name="sip" id="sip" class="form-control" value="<?=$dokterdata['sip']?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama_dokter">Nama Dokter</label>
                        <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" value="<?=$dokterdata['nama_dokter']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <input type="text" name="spesialis" id="spesialis" class="form-control" value="<?=$dokterdata['spesialis']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?=$dokterdata['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">Nomor Telepon</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="<?=$dokterdata['no_telp']?>" required>
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