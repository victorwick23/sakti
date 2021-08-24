<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['perawat']) || isset($_SESSION['dokter'])) { ?>

    <div class="box">
        <h1>Tanda Vital</h1>
        <h4>
            <small>Data Tanda Vital</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Tanda Vital</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tandavital">
                <thead>
                    <tr>
                        <th><center>Waktu</center></th>
                        <th><center>No. Rekam Medik</center></th>
                        <th><center>Nama</center></th>
                        <th><center>Berat Badan</center></th>
                        <th><center>Tinggi Badan</center></th>
                        <th><center>Lingkar Perut</center></th>
                        <th><center>Suhu</center></th>
                        <th><center>Tensi</center></th>
                        <th><center>Nadi</center></th>
                        <th><center>RR</center></th>
                        <th><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#tandavital').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "tandavital_data.php",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [10],
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a></center>";
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