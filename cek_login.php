<?php
session_start();
include 'koneksi.php';
// var_dump($_POST);
// die;
if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE `id_user` = '$username' && `password` = '$password'";
  $sql = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($sql);

  if ($user['id_user']) {

    $_SESSION["username"] = $username;
    $_SESSION["namalengkap"] = $user['nama_lengkap'];

    header('location:index.php');
  } else {
    echo "<script> alert('Username dan Password salah!'); </script>";
    // header('location:formlogin.php');
  }
}
