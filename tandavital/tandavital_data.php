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
        tb_kunjungan.tanggal_kunjungan,
        tb_pasien.no_rekam_medik,
        tb_pasien.nama_pasien,
        tb_tandavital.id_vital,
        tb_tandavital.berat,
        tb_tandavital.tinggi,
        tb_tandavital.lingkar_perut,
        tb_tandavital.suhu,
        tb_tandavital.tensi,
        tb_tandavital.nadi,
        tb_tandavital.pernafasan
    FROM tb_kunjungan
    INNER JOIN tb_pasien ON tb_kunjungan.id_pasien = tb_pasien.id_pasien
    INNER JOIN tb_tandavital ON tb_kunjungan.id_kunjungan = tb_tandavital.id_kunjungan
) temp
EOT;

// Table's primary key
$primaryKey = 'id_vital';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'tanggal_kunjungan', 'dt' => 0 ),
    array( 'db' => 'no_rekam_medik',    'dt' => 1 ),
    array( 'db' => 'nama_pasien',       'dt' => 2 ),
    array(
        'db' => 'berat',
        'dt' => 3,
        'formatter' => function ( $d, $row ){
            return $d.' kg';
        }
    ),
    array(
        'db' => 'tinggi',
        'dt' => 4,
        'formatter' => function ( $d, $row ){
            return $d.' cm';
        }
    ),
    array(
        'db' => 'lingkar_perut',
        'dt' => 5,
        'formatter' => function( $d, $row ){
            return $d.' cm';
        }
    ),
    array(
        'db' => 'suhu',
        'dt' => 6,
        'formatter' => function( $d, $row ){
            return $d.'°C';
        }
    ),
    array( 'db' => 'tensi',             'dt' => 7 ),
    array(
        'db' => 'nadi',
        'dt' => 8,
        'formatter' => function( $d, $row ){
            return $d.' bpm';
        }
    ),
    array(
        'db' => 'pernafasan',
        'dt' => 9,
        'formatter' => function( $d, $row ){
            return $d.' x/menit';
        }
    ),
    array( 'db' => 'id_vital',          'dt' => 10 ),
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