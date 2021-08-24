<?php include_once('../_header.php');
if(isset($_SESSION['admin'])) { ?>

    <div class="box">
        <h1>Tindakan</h1>
        <h4>
            <small>Data Tindakan</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Tindakan</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tindakan">
                <thead>
                    <tr>
                        <th><center>Rincian Pelayanan</center></th>
                        <th><center>PERDA (Rp)</center></th>
                        <th><center>Satuan</center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#tindakan').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "tindakan_data.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [3],
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