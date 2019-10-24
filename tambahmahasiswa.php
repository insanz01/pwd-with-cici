<?php

include "koneksi.php";
if (isset($_POST['nim'])) {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$jkel = $_POST['jkel'];
	$alamat = $_POST['alamat'];
	$tgllhr = $_POST['tgllhr'];

	$res = mysqli_query($conn, "INSERT INTO mahasiswa VALUES('$nim','$nama','$email','$jkel','$alamat','$tgllhr')") or die(mysqli_error($conn));
	if ($res) {
		header("location:index.php");
	} else {
		die("Gagal menyimpan data");
	}
}
