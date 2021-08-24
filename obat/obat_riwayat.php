<?php include_once('../_header.php');
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker'])) {
if(isset($_GET['id']) && $_GET['id'] != "" && $_GET['id'] != NULL){
    $ambil_id = @$_GET['id'];
    $ambil_sql = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$ambil_id'") or die (mysqli_error($con));
    $ambil_data = mysqli_fetch_array($ambil_sql);
    $nama_obat = $ambil_data['nama_obat'];
} else {
    $ambil_id = NULL;
    $nama_obat = "";
}
?>

    <div class="box">
        <h1>Riwayat Stok Obat</h1>
        <h4>
            <small>Data Stok Obat <mark><?=$nama_obat ?></mark></small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="stokriwayat">
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
            $('#stokriwayat').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "obat_riwayat_data.php?id=<?=$ambil_id ?>",
                columnDefs : [
                    {
                        "searchable" : false,
                        "orderable" : false,
                        "targets" : [5],
                        "render" : function(data, type, row) {
                            var btn = "<center><a href=\"obat_riwayat_del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
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