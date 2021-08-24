<?php include_once('../_header.php');
if(isset($_SESSION['admin'])) { ?>

    <div class="box">
        <h1>Dokter</h1>
        <h4>
            <small>Data Dokter</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dokter">
                <thead>
                    <tr>
                        <th><center>No. SIP</center></th>
                        <th><center>Nama Dokter</center></th>
                        <th><center>Spesialis</center></th>
                        <th><center>Alamat</center></th>
                        <th><center>No. Telp</center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#dokter').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "dokter_data.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [5],
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a><a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
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