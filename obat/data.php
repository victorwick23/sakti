<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) { ?>

    <div class="box">
        <h1>Obat</h1>
        <h4>
            <small>Data Obat</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Obat</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="obat">
                <thead>
                    <tr>
                        <th><center>Nama Obat</center></th>
                        <th><center>Stok</center></th>
                        <th><center>Harga</center></th>
                        <th><center>Exp Date</center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#obat').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "obat_data.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [4],
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"obat_riwayat.php?id="+data+"\" class=\"btn btn-primary btn-xs\"><i class=\"glyphicon glyphicon-folder-open\"></i></a><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a><a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
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