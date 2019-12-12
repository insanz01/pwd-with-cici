<?php
session_start();

if (!isset($_SESSION['username'])) {

	echo "<script>
			alert('Kamu harus login terlebih dahulu!'); 
			window.location = 'formlogin.php';
    </script>";
}

?>

<!DOCTYPE>
<html>

<head>
	<title>SQL dan MYSQL</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="asset/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="asset/css/datepicker.css">
	<?php
	include "koneksi.php";
	// include "library/import.php";
	// include "navbar.php";
	?>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">home</a>
				</div>
				<ul class="nav navbar-nav">
					<!-- <li><a href="#">Page 1</a></li> -->
					<!-- <li>
						<a href="beranda.php">Beranda</a>
					</li> -->
					<!-- <li><a href="index.php">Data</a></!-->
					<li>
						<a href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<form action="" method="post">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<input type="text" name="keyword" size="40" class="form-control" autofocus placeholder="masukan keyword" autocomplete="off" id="keyword">
					</div>
				</div>
				<!-- <div class="col-lg-2"> -->
				<!-- <div class="form-group"> -->
				<button class="btn btn-danger" type="submit" name="cari" id="tombol-cari">Cari!</button>
				<!-- </div> -->
				<!-- </div> -->
			</div>
		</form>
		<div class="row">
			<div class="col-lg-12 mb-2">
				<a href="#" class="btn btn-success" id="tambah">Create</a>
				<a href="cetak_lap.php" class="btn btn-danger mx-2">Cetak</a>
				<a href="mahasiswa.json" target="_blank" class="btn btn-info">JSON</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="container">
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>Tangal Lahir</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php
						$file = "mahasiswa.json";
						// $mahasiswa = file_get_contents($file);
						// $datajson = json_decode($mahasiswa, true);

						include 'koneksi.php';
						$query = mysqli_query($conn, "SELECT *FROM mahasiswa ORDER BY nim DESC") or die(mysqli_error($conn));
						if (mysqli_num_rows($query) == 0) {
							echo '<tbody>
						<tr class="active">
						<td colspan="5">Tidak ada data yang di entrikan </td>
						</tr>
						</tbody>';
						} else {
							$no = 1;
							while ($data = mysqli_fetch_array($query)) {
								// foreach ($datajson as $data) {
								echo '<tbody>
						<tr class="active">';
								echo '<td>' . $data['nim'] . '</td>';
								echo '<td>' . $data['nama'] . '</td>';
								echo '<td>' . $data['email'] . '</td>';
								echo '<td>' . $data['alamat'] . '</td>';
								echo '<td>' . $data['jkel'] . '</td>';
								echo '<td>' . $data['tgllhr'] . '</td>';


								echo '<td><a class="btn btn-primary" href="updatemahasiswa.php?nim=' . $data['nim'] . '">Update</a>
						 <a class="btn btn-danger" href="hapusmahasiswa.php?ID=' . $data['nim'] . '">Delete</a></tr>';
								echo '</tr>';
								$no++;
							}
						}

						?>
					</table>
				</div>
			</div>

			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Masukan Data Mahasiswa</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="form" id="form" onsubmit="return validasi(this)" action="tambahmahasiswa.php" method="POST">
								<fieldset>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Nim</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="masukan nim" id="nim" name="nim">
											<small id="v_nim" class="text-danger"></small>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Nama Lengkap</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Masukan Nama" id="nama" name="nama">
											<small id="v_nama" class="text-danger"></small>
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-lg-2 control-label">Email</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Masukan Email" id="email" name="email">
											<small id="v_email" class="text-danger"></small>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Alamat</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Masukan Alamat" id="alamat" name="alamat">
											<small id="v_alamat" class="text-danger"></small>
										</div>
									</div>
									<div class="form-group">
										<label for="jkel" class="col-lg-2 control-label">Jenis Kelamin</label>
										<div class="col-lg-10">
											<select class="form-control" id="jkel" name="jkel">
												<option value="l" selected>Laki laki</option>
												<option value="p">Perempuan</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<?php
										$tgl =  date('l, d-m-Y');
										?>
										<label for="inputEmail" class="col-lg-2 control-label">Tanggal Lahir</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" placeholder="" id="tgllhr" name="tgllhr">
											<small id="v_tgllhr" class="text-danger"></small>
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
			</div>

		</div>
	</div>
</body>

<script src="admin/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="admin/js/main.js"></script>

<script>
	const validasi = function(form) {

		let v_nim = document.getElementById('v_nim');
		let v_nama = document.getElementById('v_nama');
		let v_alamat = document.getElementById('v_alamat');
		let v_email = document.getElementById('v_email');
		let v_tgllhr = document.getElementById('v_tgllhr');

		let pola_nim = /^[0-9]+$/;
		let pola_username = /^[a-zA-Z0-9\_\-]{6,100}$/;
		let pola_email = /^[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
		let pola_uppercase = /[A-Z]/g;
		let pola_lowercase = /[a-z]/g;

		let syarat = 0;

		if (pola_nim.test(form.nim.value) && form.nim.value != "") {
			v_nim.innertText = "";
			syarat++;
		} else {
			v_nim.innerText = "Kolom nim masih ada yang salah";
		}

		if (form.nama.value != "" && !pola_lowercase.test(form.nama.value)) {
			v_nama.innertText = "";
			syarat++;
		} else {
			v_nama.innerText = "Kolom nama masih ada yang salah";
		}

		if (pola_email.test(form.email.value) && form.email.value != "" && !pola_uppercase.test(form.email.value)) {
			v_email.innertText = "";
			syarat++;
		} else {
			v_email.innerText = "Kolom email masih ada yang salah";
		}

		if (form.alamat.value != "") {
			v_alamat.innertText = "";
			syarat++;
		} else {
			v_alamat.innerText = "Kolom alamat masih ada yang salah";
		}

		if (form.tgllhr.value != "") {
			v_tgllhr.innertText = "";
			syarat++;
		} else {
			v_tgllhr.innerText = "Kolom tanggal masih ada yang salah";
		}

		if (syarat == 5) {
			return true;
		} else {
			Swal.fire(
				'Ops..',
				'Form masih ada yang salah nich',
				'error'
			);
			return false;
		}
	}
</script>

<script type="text/javascript">
	$('#tambah').click(function() {
		$('#myModal').modal('show');
	});
</script>

</html>