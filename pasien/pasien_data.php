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
        tb_pasien.id_pasien,
        tb_pasien.no_rekam_medik,
        tb_pasien.nik,
        tb_pasien.no_bpjs,
        tb_pasien.nama_pasien,
        tb_pasien.jenis_kelamin,
        tb_pasien.ttl,
        tb_pasien.umur,
        tb_pasien.alamat,
        tb_pasien.no_telp
    FROM tb_pasien
) temp
EOT;

// Table's primary key
$primaryKey = 'id_pasien';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'no_rekam_medik', 'dt' => 0 ),
    array( 'db' => 'nik',            'dt' => 1 ),
    array( 'db' => 'no_bpjs',        'dt' => 2 ),
    array( 'db' => 'nama_pasien',    'dt' => 3 ),
    array( 'db' => 'jenis_kelamin',  'dt' => 4 ),
    array( 'db' => 'ttl',            'dt' => 5 ),
    array( 'db' => 'umur',           'dt' => 6 ),
    array( 'db' => 'alamat',         'dt' => 7 ),
    array( 'db' => 'no_telp',        'dt' => 8 ),
    array( 'db' => 'id_pasien',      'dt' => 9 ),
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


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../_assets/libs/DataTables/ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);