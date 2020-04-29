<?php
include "database.php";
session_start();
session_destroy();

$userlogin = $_SESSION['login'];

$query = "SELECT * FROM user WHERE id = '$userlogin'";
$data = $db->prepare($query);
$data->execute();

$user = $data->fetch();
$id = $user['id'];

$queryDelete = "DELETE FROM user WHERE id = '$id'";
$data2 = $db->prepare($queryDelete);
$data2->execute();
header("Location: login.php?msg=Akun telah dihapus");
