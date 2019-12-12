<?php

session_start();
if (!isset($_SESSION['username'])) {
  header('location:formlogin.php');
}

include "koneksi.php";
include "library/import.php";
include "navbar.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Login TIF UAD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

  <div class="container">
    <br>
    <h3 class="text-center">PORTAL AKADEMIK TIF UAD</h3>
    <p class="lead">
      Halo, Nama Saya <?= $_SESSION['namalengkap'] ?>
    </p>
  </div>
</body>

</html>