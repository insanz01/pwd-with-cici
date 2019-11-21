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
      <form action="cek_login.php" method="POST" onsubmit="return validasi(this)">
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <script>
      const validasi = (f) => {
        let v_user = document.getElementById('v_username');
        let v_pass = document.getElementById('v_password');

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
      }
    </script>

  </body>

  </html>