<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter']) || isset($_SESSION['kasir'])) { ?>

    <div class="box">
        <h1>Kunjungan</h1>
        <h4>
            <small>Data Antrian</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Antrian Baru</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="antrian">
                <thead>
                    <tr>
                        <th><center>Waktu Kunjungan</center></th>
                        <th><center>No. Antrian</center></th>
                        <th><center>No. Rekam Medik</center></th>
                        <th><center>Nama</center></th>
                        <th><center>Keluhan</center></th>
                        <th><center>Poli Tujuan</center></th>
                        <th><center>Status</center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#antrian').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "kunjungan_data.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [7],
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a><a href=\"del.php?id="+data+"\" onclick=\"return confirm('Apakah pasien ini sudah selesai kunjungan?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-ok\"></i></a></center>";
                            return btn;
                        }
                    }
                ],
                "order" : [1, "asc"]
            } );
        } );
        </script>
    </div>

<?php
} else {
    include_once('../pesan_error.php');
}
include_once('../_footer.php'); ?>