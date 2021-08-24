<?php include_once('../_header.php'); 
if(isset($_SESSION['admin']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Data Pasien</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Pasien Baru</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pasien">
                <thead>
                    <tr>
                        <th><center>No. Rekam Medik</center></th>
                        <th><center>NIK</center></th>
                        <th><center>No. BPJS</center></th>
                        <th><center>Nama</center></th>
                        <th><center>L / P</center></th>
                        <th><center>TTL</center></th>
                        <th><center>Umur</center></th>
                        <th><center>Alamat</center></th>
                        <th><center>No. Telp</center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#pasien').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "pasien_data.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [9],
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a><a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                            return btn;
                        }
                    }
                ],
                "order" : [0, "asc"]
            } );
        } );
        </script>
    </div>

<?php
} else {
    include_once('../pesan_error.php');
}
include_once('../_footer.php'); ?>