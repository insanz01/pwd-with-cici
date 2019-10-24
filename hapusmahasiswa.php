<?php
include 'koneksi.php';

if(isset($_GET['ID'])){
	$nim = $_GET['ID'];
	$query="DELETE from mahasiswa where nim='$nim'";

	// var_dump($query); die;

	if (mysqli_query($conn,$query)){
			header('location:index.php');
	}

	else{
		die('bermasalah saat menghapus');
	}

} else {
	die("bermasalah");
}