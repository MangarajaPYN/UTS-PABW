<?php
include "database.php";
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$userlogin = $_SESSION['login'];

//table1
$query = "SELECT * FROM user WHERE id = '$userlogin'";
$data = $db->prepare($query);
$data->execute();

$user = $data->fetch();
$id = $user['id'];

//table 2
$query2 = "SELECT * FROM gaji WHERE id = '$id'";
$data2 = $db->prepare($query2);
$data2->execute();

$gaji = $data2->fetch();
$uang = $gaji['uang'];



?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profil Pegawai</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class=""></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pegawai Pemerintahan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Beranda
      </div>


      <li class="nav-item">
        <a class="nav-link" href="pegawai.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pegawai</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Profil Saya
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="profil.php">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Profil</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['nama']; ?></span>
                <img class="img-profile rounded-circle" src="img/about2.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="container text-center mb-5">
            <img class="rounded-circle" src="img/about2.png" alt="" width="250" height="250">
            <br>
            <a href="#" data-toggle="modal" data-target="#editFoto">Edit Foto</a>
          </div>
          <div class="row">

            <?php if (isset($_GET['msg'])) {
              echo '<div class="alert alert-success text-center" role="alert">' .
                $_GET['msg'] .
                '</div>';
            } ?>

            <table class="table" id="dataTable" width="80%" cellspacing="0">
              <tr>
                <th>Nama Lengkap</th>
                <th> : </th>
                <th><?php echo $user['nama']; ?></th>
                <th><a href="#" data-toggle="modal" data-target="#editNama">Edit</a></th>
              </tr>
              <tr>
                <th>Email</th>
                <th> : </th>
                <th><?php echo $user['email']; ?></th>
                <th><a href="#" data-toggle="modal" data-target="#editEmail">Edit</a></th>
              </tr>
              <tr>
                <th>Change Password</th>
                <th> : </th>
                <th>***************</th>
                <th><a href="#" data-toggle="modal" data-target="#editPass">Edit</a></th>
              </tr>
            </table>
          </div>
          <div class="row mt-4 mb-5">
            <div class="col-md-12 text-center">
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                Hapus Akun
              </a></th>
            </div>
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; momoiro.tech 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik tombol "Logout" jika anda yakin ingin keluar...</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin Menghapus Akun?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan "Delete account" jika anda yakin ingin menghapus akun ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="delete.php">Hapus Akun</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal edit Foto -->
  <div class="portfolio-modal modal fade" id="editFoto" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Ubah Foto
                </h2>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/about2.png" alt="" width="150" height="150">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Masukkan foto profil anda
                  <br>
                  <input type="file">
                </p>
                <a class="btn btn-primary" href="#">
                  <i class="fas fa-check fa-fw"></i>
                  Ganti
                </a>
                <a class="btn btn-danger" href="profil.php">
                  <i class="fas fa-times fa-fw"></i>
                  Batal
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal edit Nama -->
  <div class="portfolio-modal modal fade" id="editNama" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Edit Nama
                </h2>
                <!-- Portfolio Modal - Text -->
                <p class="mb-5 mt-5">Masukkan Nama baru
                </p>
                <form class="user mb-5" action="update.php" method="POST">
                  <div class="form-group row">
                    <input type="text" name="editNama" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Lengkap" value="<?php echo $user['nama']; ?>">
                  </div>
                  <button type="submit" name="gantiNama" class="btn btn-primary" href="#">
                    <i class="fas fa-check fa-fw"></i>
                    Ganti
                  </button>
                  <button type="reset" class="btn btn-danger" href="profil.php" data-dismiss="modal">
                    <i class="fas fa-times fa-fw"></i>
                    Batal
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal edit email -->
  <div class="portfolio-modal modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Edit Email
                </h2>
                <!-- Portfolio Modal - Text -->
                <p class="mb-5 mt-5">Masukkan Email Baru
                </p>
                <form class="user mb-5" action="update.php" method="POST">
                  <div class="form-row ">
                    <div class="form-group col-md-12">
                      <label for="inputPassword4"></label>
                      <input type="email" name="emailLama" class="form-control form-control-user" id="inputPassword4" placeholder="Email Lama">
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-12">
                      <label for="inputPassword4"></label>
                      <input type="email" name="emailBaru" class="form-control form-control-user" id="inputPassword4" placeholder="Email Baru">
                    </div>
                  </div>
                  <button type="submit" name="gantiEmail" class="btn btn-primary" href="#">
                    <i class="fas fa-check fa-fw"></i>
                    Ganti
                  </button>
                  <button type="reset" class="btn btn-danger" href="profil.php" data-dismiss="modal">
                    <i class="fas fa-times fa-fw"></i>
                    Batal
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal edit Password -->
  <div class="portfolio-modal modal fade" id="editPass" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Edit Password
                </h2>
                <!-- Portfolio Modal - Text -->
                <p class="mb-5 mt-5">Masukkan Password Baru
                </p>
                <form class="user mb-5" action="update.php" method="POST">
                  <div class="form-row ">
                    <div class="form-group col-md-12">
                      <label for="inputPassword4"></label>
                      <input type="password" name="pass1" class="form-control form-control-user" id="inputPassword4" placeholder="Password Lama">
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-12">
                      <label for="inputPassword4"></label>
                      <input type="password" name="pass2" class="form-control form-control-user" id="inputPassword4" placeholder="Password Baru">
                    </div>
                  </div>
                  <button type="submit" name="gantiPass" class="btn btn-primary" href="#">
                    <i class="fas fa-check fa-fw"></i>
                    Ganti
                  </button>
                  <button type="reset" class="btn btn-danger" href="profil.php" data-dismiss="modal">
                    <i class="fas fa-times fa-fw"></i>
                    Batal
                  </button>
                </form>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>