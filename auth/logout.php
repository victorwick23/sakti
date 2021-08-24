<?php
require_once "../_config/config.php";
@session_start();

session_destroy();

// unset($_SESSION['admin']);
echo "<script>window.location='".base_url('auth/login.php')."';</script>";
?>