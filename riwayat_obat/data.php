<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['apoteker'])) { ?>

    <div class="box">
        <h1>Riwayat Stok Obat</h1>
        <h4>
            <small>Data Stok Obat</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Stok Obat</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="riwayatstok">
                <thead>
                    <tr>
                        <th><center>Tanggal Masuk</center></th>
                        <th><center>Nama Obat</center></th>
                        <th><center>Nama Pemasok</center></th>
                        <th><center>Stok Awal</center></th>
                        <th><center>Penambahan</center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#riwayatstok').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "riwayat_obat_data.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [5],
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                            return btn;
                        }
                    }
                ],
                "order" : [0, "desc"]
            } );
        } );
        </script>
    </div>

<?php
} else {
    include_once('../pesan_error.php');
}
include_once('../_footer.php'); ?>