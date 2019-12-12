<?php 
include "koneksi.php";
if(isset($_GET['nim'])){
	$nim=$_GET['nim'];
	$query="select* from mahasiswa where nim=$nim";
	$res=mysqli_query($conn,$query);
	$m=mysqli_fetch_assoc($res);

}
?>
<!DOCTYPE>
<html>
<head>
	<title>SQL dan MYSQL</title>
	<?php
		// include "koneksi.php";
		include "library/import.php";
		include "navbar.php";
	?>
</head>
<body>
	<div class="container">
		  <div class="row">

		  	<div class="col-lg-7 mx-auto">
		  		<form class="form-horizontal" id="form" action="edit.php" method="POST" >
		  <fieldset>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Nim</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" placeholder="masukan nim" id="nim" name="nim" required value="<?= $m['nim'] ?>">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Nama Lengkap</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control"  placeholder="Masukan Nama" id="nama" name="nama" required  value="<?= $m['nama'] ?>">
		      </div>
		    </div>
		     <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Alamat</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control"  placeholder="Masukan Alamat" id="alamat" name="alamat" required  value="<?= $m['alamat'] ?>" >
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="select" class="col-lg-2 control-label">Jenis Kelamin</label>
		      <div class="col-lg-10">
		        <select class="form-control" id="select" name="jkel" required >
		          <option value="l" <?= ($m['jkel'])? 'selected': '' ?>>Laki laki</option>
		          <option value="p" <?= ($m['jkel'])? 'selected': '' ?>>Perempuan</option>
		        </select>
		      </div>
		    </div>
		    
		      <div class="form-group">
				    	<?php
				    		$tgl =  date('l, d-m-Y');
				    	?>
				      <label for="inputEmail" class="col-lg-2 control-label">Tanggal Lahir</label>
				      <div class="col-lg-10">
				        <input type="date" class="form-control"  placeholder="" id="tgllhr" name="tgllhr" value="<?= $m['tgllhr'] ?>">
				      </div>
				    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <input type="submit" name="simpan" class="btn btn-primary" value="Tambahkan">
		      </div>
		    </div>
		  </fieldset>
		</form> 
		  	</div>
</div>
</div>
</body>
</html>

