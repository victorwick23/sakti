<?php
require_once "../_config/config.php";

if(isset($_POST['login'])) {
    $user = trim(mysqli_real_escape_string($con, $_POST['user']));
    $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
    $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die(mysqli_error($con));
    $data_login = mysqli_fetch_array($sql_login);
    if(mysqli_num_rows($sql_login) > 0){
        if($data_login['level'] == "admin"){
            @$_SESSION['admin'] = $data_login['id_user'];
            echo "<script>window.location='".base_url()."';</script>";
        } else if($data_login['level'] == "dokter"){
            @$_SESSION['dokter'] = $data_login['id_user'];
            echo "<script>window.location='".base_url()."';</script>";
        } else if($data_login['level'] == "apoteker"){
            @$_SESSION['apoteker'] = $data_login['id_user'];
            echo "<script>window.location='".base_url()."';</script>";
        } else if($data_login['level'] == "perawat"){
            @$_SESSION['perawat'] = $data_login['id_user'];
            echo "<script>window.location='".base_url()."';</script>";
        } else if($data_login['level'] == "pendaftaran"){
            @$_SESSION['pendaftaran'] = $data_login['id_user'];
            echo "<script>window.location='".base_url()."';</script>";
        } else if($data_login['level'] == "kasir"){
            @$_SESSION['kasir'] = $data_login['id_user'];
            echo "<script>window.location='".base_url()."';</script>";
        }
    } else{
        echo "<script>alert('LOGIN GAGAL! USERNAME / PASSWORD SALAH!'); window.location='".base_url('auth/login.php')."';</script>";
    }
}
?>

<!-- <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <strong>Login gagal!</strong> Username / password salah!
            </div>
        </div>
</div> -->