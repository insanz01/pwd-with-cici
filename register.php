<?php

session_start();
if (isset($_SESSION['username'])) {
  header('location:index.php');
}

include "koneksi.php";
include "library/import.php";
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
    <form action="cek_aksi.php" method="POST" onsubmit="return validasi(this)">
      <div class="form-group">
        <label for="Username">Username:</label>
        <input type="username" class="form-control" id="username" placeholder="Enter Username" name="username">
        <small id="v_username" class="text-danger"></small>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        <small id="v_password" class="text-danger"></small>
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" class="form-control" id="nama" placeholder="Enter fullname" name="nama">
        <small id="v_fullname" class="text-danger"></small>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        <small id="v_email" class="text-danger"></small>
      </div>
      <div class="form-group">
        <label for="level">Level User</label>
        <select name="level" id="level" class="form-control">
          <option value="User">User</option>
          <option value="Admin">Admin</option>
        </select>
      </div>
      <div class="form-group">
        <label for="gambar">Captcha</label>
        <img src="captcha.php" alt="captcha nya bro" class="d-block w100">
      </div>
      <div class="form-group">
        <label for="captcha">Masukan Kode</label>
        <input type="text" id="captcha" name="captcha" class="form-control" placeholder="Enter captcha">
      </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
  </div>

  <script>
    const validasi = (f) => {
      let v_user = document.getElementById('v_username');
      let v_pass = document.getElementById('v_password');
      let v_name = document.getElementById('v_fullname');
      let v_email = document.getElementById('v_email');

      if (f.username.value == "") {
        v_user.innerText = "Username tidak boleh kosong";
        return false;
      } else {
        v_user.innerText = "";
      }

      if (f.password.value == "") {
        v_pass.innerText = "Password tidak boleh kosong";
        return false;
      } else {
        v_pass.innerText = "";
      }

      if (f.nama.value == "") {
        v_name.innerText = "Nama tidak boleh kosong";
        return false;
      } else {
        v_name.innerText = "";
      }

      if (f.email.value == "") {
        v_email.innerText = "Email tidak boleh kosong";
        return false;
      } else {
        v_email.innerText = "";
      }
    }
  </script>

</body>

</html>