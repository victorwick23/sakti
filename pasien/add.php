<?php include_once('../_header.php'); 
if(isset($_SESSION['admin']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Tambah Data Pasien</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="no_rekammedik">Nomor Rekam Medik</label>
                        <input type="text" name="no_rekammedik" id="no_rekammedik" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nik">Nomor Induk Kependudukan</label>
                        <input type="number" name="nik" id="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="bpjs">Nomor BPJS</label>
                        <input type="number" name="bpjs" id="bpjs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" required> Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" value="P"> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tempat Tanggal Lahir</label>
                        <input type="text" name="ttl" id="ttl" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" id="umur" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" name="telp" id="telp" class="form-control" required>
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