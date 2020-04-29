<?php
include "database.php";

if (isset($_POST['register'])) {

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pass1 = $_POST['pass'];
  $pass2 = $_POST['pass2'];

  $error = null;

  //cek ketersediaan email
  $query = "SELECT email FROM user WHERE email = '$email'";
  $data = $db->prepare($query);
  $data->execute();

  while ($user = $data->fetch()) {
    if ($user['email'] == $email) { ?>
      <div class="alert alert-danger text-center" role="alert">
        Username sudah ada
      </div>
    <?php $error = true;
    }
  }

  //cek password sudah terisi
  if ($pass1 == "") { ?>
    <div class="alert alert-danger text-center" role="alert">
      password harus diisi
    </div>
  <?php $error = true;
  }


  //cek konfirmasi
  if ($pass1 != $pass2) : ?>
    <div class="alert alert-danger text-center" role="alert">
      Password tidak sama
    </div>
  <?php $error = true;
  endif;

  //enkripsi password
  $password = md5($pass1);

  if (!$error) {
    //masukkan ke database
    $query = "INSERT INTO user VALUES ('','$nama','$email','about2.png','$password')";
    $data = $db->prepare($query);
    $data->execute();

    $query2 = "INSERT INTO gaji VALUES ('','2500000')";
    $data2 = $db->prepare($query2);
    $data2->execute();

  ?>
    <div class="alert alert-success text-center" role="alert">
      Selamat anda telah terdaftar, silahkan login untuk melanjutkan...
    </div>
<?php }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pendaftaran</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img src="img/logo.jpg" alt="" width="500px" height="520px"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun Anda !!!</h1>
              </div>
              <form method="POST" class="user" action="">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="pass" id="password1" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="pass2" id="password2" placeholder="Ulangi Password">
                  </div>
                </div>
                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                  Buat Akun
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Klik disini jika anda lupa password</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Sudah punya akun? klik disini untuk login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan "Logout" jika anda ingin keluar sekarang.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>