<?php
include "database.php";
session_start();

$msg = "";

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  if (empty($email) || empty($pass)) {
    $msg = "<label>Masukkan tidak boleh kosong</label>";
  } else {
    $query = "SELECT * FROM user WHERE email = '$email'";
    $data = $db->prepare($query);
    $data->execute();

    $ketemu = $data->rowCount();

    if ($ketemu > 0) {
      $user = $data->fetch();

      $hash = md5($pass);
      if ($hash == $user['password']) {
        $nama = $user['nama'];
        $_SESSION['login'] = $user['id'];
        header("Location: index.php");
        exit;
      } else {
        $msg = "<label>Username atau Password salah</label>";
      }
    } else {
      $msg = "<label>Username atau Password salah</label>";
    }
  }
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

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="img/logo.jpg" alt="" width="400px" height="520px"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center mb-5">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang di web Data Pegawai Pemerintahan, silahkan login untuk masuk...</h1>
                    <?php

                    if ($msg != "") {
                      echo '<label class="text-danger">' . $msg . '</label>';
                    }

                    if (isset($_GET['msg'])) {
                      echo '<label class="text-success">' . $_GET['msg'] . '</label>';
                    }

                    ?>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email....">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" name="login" href="index.php" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">klik disini jika anda lupa password</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Belum punya akun? klik disini untuk mendaftar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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