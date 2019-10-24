<!DOCTYPE>
<html>

<head>
  <title>SQL dan MYSQL</title>
  <?php
  include "koneksi.php";
  include "library/import.php";
  include "navbar.php";
  ?>
</head>

<body>
  <div class="container">
    <form action="tambah_praktikum.php" method="post" onsubmit="return validasi()">
      <div class="form-group">
        <label for="NIM">NIM</label>
        <input type="text" name="nama" class="form-control" id="nama">
      </div>
      <div class="form-group">
        <label for=""></label>
      </div>
    </form>
  </div>
</body>

</html>