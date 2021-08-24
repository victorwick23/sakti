<?php include_once('../_header.php');
if(isset($_SESSION['admin'])) { ?>

    <div class="box">
        <h1><center>Laporan</center></h1>
        <h4 style="margin-bottom: 20px;">
            <small><center>Silahkan klik pada laporan yang ingin dicetak atau didownload!</center></small>
        </h4>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 text-center bg-primary" style="height: 165px; padding-top: 24px;">
                    <a href="<?=base_url('laporan/daftar_kunjungan/generate.php')?>" class="btn" onMouseOver="this.style.color='#000000'" onMouseOut="this.style.color='#ffffff'" style="color:#ffffff; font-size: 22px"><i class="glyphicon glyphicon-save-file" style="font-size: 40px;"></i><br>Laporan<br>Daftar Kunjungan</a>
                </div>
                <div class="col-lg-6 text-center bg-success" style="height: 165px; padding-top: 24px;">
                    <a href="<?=base_url('laporan/daftar_penyakit/generate.php')?>" class="btn" onMouseOver="this.style.color='#649d66'" onMouseOut="this.style.color='#06623b'" style="color:#06623b; font-size: 22px"><i class="glyphicon glyphicon-save-file" style="font-size: 40px;"></i><br>Laporan<br>Penyakit Terbanyak</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center bg-warning" style="height: 165px; padding-top: 24px;">
                    <a href="<?=base_url('laporan/daftar_obat/generate.php')?>" class="btn" onMouseOver="this.style.color='#ffd57e'" onMouseOut="this.style.color='#d5c455'" style="color:#d5c455; font-size: 22px"><i class="glyphicon glyphicon-save-file" style="font-size: 40px;"></i><br>Laporan<br>Penggunaan Obat</a>
                </div>
                <div class="col-lg-6 text-center bg-danger" style="height: 165px; padding-top: 24px;">
                    <a href="<?=base_url('laporan/obat_masuk/generate.php')?>" class="btn" onMouseOver="this.style.color='#e97171'" onMouseOut="this.style.color='#931a25'" style="color:#931a25; font-size: 22px"><i class="glyphicon glyphicon-save-file" style="font-size: 40px;"></i><br>Laporan<br>Obat Masuk</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center bg-info" style="height: 165px; padding-top: 24px;">
                    <a href="<?=base_url('laporan/uang_masuk/generate.php')?>" class="btn" onMouseOver="this.style.color='#3282b8'" onMouseOut="this.style.color='#0f4c75'" style="color:#0f4c75; font-size: 22px"><i class="glyphicon glyphicon-save-file" style="font-size: 40px;"></i><br>Laporan<br>Uang Masuk</a>
                </div>
            </div>
        </div>

    </div>

<?php
} else {
    include_once('../pesan_error.php');
}
include_once('../_footer.php'); ?>