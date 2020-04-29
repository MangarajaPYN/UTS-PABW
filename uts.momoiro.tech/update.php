<?php
include "database.php";
session_start();

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


//UPDATE DATA DIRI
//ganti Nama
if (isset($_POST['gantiNama'])) {
    $namaBaru = $_POST['editNama'];

    $queryUpdate = "UPDATE user SET nama= '$namaBaru' WHERE id = '$id'";
    $data2 = $db->prepare($queryUpdate);
    $data2->execute();
    header("Location: profil.php?msg=Nama berhasil diubah");
}

//Ganti email
if (isset($_POST['gantiEmail'])) {
    $email = $_POST['emailLama'];
    $emailBaru = $_POST['emailBaru'];

    if ($email == $user['email']) {
        $queryUpdate = "UPDATE user SET email= '$emailBaru' WHERE id = '$id'";
        $data2 = $db->prepare($queryUpdate);
        $data2->execute();

        header("Location: profil.php?msg=Email berhasil diperbaharui");
    } else {

        header("Location: profil.php?msg=Email salah");
    }
}

//Ganti email
if (isset($_POST['gantiPass'])) {
    $pass = $_POST['pass1'];
    $passBaru = $_POST['pass2'];

    $hash = md5($pass);

    if ($hash == $user['password']) {


        $hashBaru = md5($passBaru);

        $queryUpdate = "UPDATE user SET user.password= '$hashBaru' WHERE id = '$id'";
        $data2 = $db->prepare($queryUpdate);
        $data2->execute();

        header("Location: profil.php?msg=Kata sandi berhasil diubah");
    } else {

        header("Location: profil.php?msg=Kata sandi lama salah");
    }
}

//reset Pass
if (isset($_POST['resetPass'])) {
    $email = $_POST['email'];
    $passBaru = "admin";

    $hashBaru = md5($passBaru);

    if (!empty($email)) {

        $queryUpdate = "UPDATE user SET user.password= '$hashBaru' WHERE email = '$email'";
        $data2 = $db->prepare($queryUpdate);
        $data2->execute();

        header("Location: forgot-password.php?msg=Kata sandi telah menjadi default 'admin'");
    } else {

        header("Location: forgot-password.php?msg=Email salah");
    }
}
//END UPDATE DATA DIRI
