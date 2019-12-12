<?php
session_start();
include 'koneksi.php';

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];
  $email = $_POST['email'];
  $nama = $_POST['nama'];

  $query = "SELECT * FROM users WHERE `id_user` = '$username' && `password` = '$password'";
  $sql = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($sql);

  if ($_POST['captcha'] == $_SESSION['captcha_code']) {
    if ($user['id_user']) {

      echo "<script>
      alert('Akun sudah ada!');
  
      window.location = 'http://localhost/pertemuan3crud/register.php'
      
      </script>";
    } else {
      $query = "INSERT INTO users VALUES('$username', '$password', '$nama', '$email', '$level')";

      if (mysqli_query($conn, $query)) {
        echo "<script>
      alert('Berhasil dibuat!');
  
      window.location = 'http://localhost/pertemuan3crud/formlogin.php'
      
      </script>";
      }
    }
  } else {
    echo "<script>
      alert('Captcha tidak sesuai!');
  
      window.location = 'http://localhost/pertemuan3crud/register.php'
      
      </script>";
  }
}
