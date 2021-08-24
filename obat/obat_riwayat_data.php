<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = <<<EOT
(
    SELECT
        tb_obat_pemasok.id_op,
        tb_obat.id_obat,
        tb_obat.nama_obat,
        tb_pemasok.nama_pemasok,
        tb_obat_pemasok.tgl_masuk,
        tb_obat_pemasok.stok_awal,
        tb_obat_pemasok.penambahan
    FROM tb_obat_pemasok
    INNER JOIN tb_obat ON tb_obat_pemasok.id_obat = tb_obat.id_obat
    INNER JOIN tb_pemasok ON tb_obat_pemasok.id_pemasok = tb_pemasok.id_pemasok
) temp
EOT;

// Table's primary key
$primaryKey = 'id_op';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'tgl_masuk',    'dt' => 0 ),
    array( 'db' => 'nama_obat',    'dt' => 1 ),
    array( 'db' => 'nama_pemasok', 'dt' => 2 ),
    array(
        'db' => 'stok_awal',
        'dt' => 3,
        'formatter' => function( $d, $row ) {
            return number_format($d);
        }
    ),
    array(
        'db' => 'penambahan',
        'dt' => 4,
        'formatter' => function( $d, $row ) {
            return number_format($d);
        }
    ),
    array( 'db' => 'id_op',        'dt' => 5 ),
    // array(
    //     'db'        => 'salary',
    //     'dt'        => 5,
    //     'formatter' => function( $d, $row ) {
    //         return '$'.number_format($d);
    //     }
    // )
);

// SQL server connection information
include_once "../_config/conn.php";

$obatid = @$_GET['id'];

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../_assets/libs/DataTables/ssp.class.php' );

echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "id_obat='$obatid'" )
);