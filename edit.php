<?php

include "koneksi.php";
if(isset($_POST['nim'])){
	$nim=$_POST['nim'];
	$nama=$_POST['nama'];
	$jkel=$_POST['jkel'];
	$alamat=$_POST['alamat'];
	$tgllhr=$_POST['tgllhr'];


	$query = "UPDATE mahasiswa SET nama='$nama', jkel='$jkel', alamat='$alamat', tgllhr='$tgllhr' WHERE nim = '$nim'";

	$res = mysqli_query($conn,$query) or die(mysqli_error($conn));
	if($res){
		header("location:index.php");
	}
	else{
		die("Gagal menyimpan data");
	}
}