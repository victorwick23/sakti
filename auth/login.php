<?php
require_once "../_config/config.php";
if(isset($_SESSION['admin']) || isset($_SESSION['dokter']) || isset($_SESSION['apoteker']) || isset($_SESSION['perawat']) || isset($_SESSION['pendaftaran']) || isset($_SESSION['kasir'])) {
    echo "<script>window.location='".base_url()."';</script>";
} else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Halaman Masuk SAKTI</title>
  </head>
  <body>
    <!-- nav -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <img alt="Puskesmas" src="img/landpage/puskes.png">
          </a>
          <a class="navbar-brand" href="#">
            <img alt="Poltekkes" src="img/landpage/poltek.png">
          </a>
          <a class="navbar-brand" href="#">
            <img alt="sakti" src="img/landpage/sakti2.png">
          </a>
          <a class="navbar-brand" href="#">
            <img class="logo-new" alt="sakti" src="img/landpage/cidel.png">
          </a>
          <a class="navbar-brand" href="#">
            <img class="logo-kemendikbud" alt="sakti" src="img/landpage/kemendikbud.png">
          </a>
          <a class="navbar-brand" href="#">
            <img class="logo-kemendikbud" alt="sakti" src="img/landpage/isb.png">
          </a>
        </div>
      </div>
    </nav>
    <!-- nav -->
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
          <img class="login-img" src="img/landpage/sakti flat illustration.png" alt="responsive image">
        </div>
        <div class="col-lg-5 col-lg-offset-1" id="div2">
          <img src="img/landpage/sakti2.png" class="img-sakti">
          <h1 class="font-weight-bold">Selamat Datang</h1>                  
          <h4 style="text-align: center;">silahkan masuk untuk melanjutkan</h4>
          <form action="cek_login.php" method="post">
            <div class="form-group">
              <div class="col-lg-7" id="formu">
                <input type="text" name="user" class="form-control" placeholder="username" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-7" id="formu">
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-7" id="formu">
                <input type="submit" name="login" class="btn1" value="masuk">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- logo-mobile-view -->
    <div class="container">
        <div class="navbar-bottom">
          <div class="row">
            <a class="col-xs-3 navbar-mobile" href="#">
              <img class="logo-bottom center-block" alt="Puskesmas" src="img/landpage/puskes.png">
            </a>
            <a class="col-xs-3 navbar-mobile" href="#">
              <img class="logo-bottom center-block" alt="Poltekkes" src="img/landpage/poltek.png">
            </a>
            <a class="col-xs-3 navbar-mobile" href="#">
              <img class="logo-bottom center-block" alt="sakti" src="img/landpage/sakti2.png">
            </a>
            <a class="col-xs-3 navbar-mobile" href="#">
              <img class="logo-new center-block" alt="sakti" src="img/landpage/cidel.png">
            </a>
          </div>
          <div class="row">
            <a class="col-xs-6 navbar-mobile" href="#">
              <img class="logo-kemendikbud center-block" alt="sakti" src="img/landpage/kemendikbud.png">
            </a>
            <a class="col-xs-6 navbar-mobile" href="#">
              <img class="logo-kemendikbud center-block" alt="sakti" src="img/landpage/isb.png">
            </a>
          </div>
        </div>
      </div>

    <!-- footer -->
    <nav class="navbar-fixed-bottom">
      <div class="container-fluid" id="footer">
        <div class="footer-row">
          <div class="col-lg-7">
            <p>UPT Puskesmas Air Gegas</p>
          </div>
        </div>
        <div class="footer-row">
          <div class="col-lg-6">
            <p>Kabupaten Bangka Selatan-Provinsi Kep.Bangka Belitung</p>
          </div>
          <div class="col-lg-4 col-lg-offset-2">
            <p>&copy;CV Asak Creative Berkarya 2020</p>
          </div>
        </div>
      </div>
    </nav>
  <!-- footer -->
  </section>
  <!-- konten -->
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
  </body>
</html>
<?php
}
?>