<?php
$file = "mahasiswa.json";
$mahasiswa = file_get_contents($file);
$datajson = json_decode($mahasiswa, true);

// var_dump($datajson);
// die;

if (isset($_POST['simpan'])) {
  $datajson[] = array(
    "nim" => $_POST['nim'],
    "nama" => $_POST['nama'],
    "email" => $_POST['email'],
    "jkel" => $_POST['jkel'],
    "alamat" => $_POST['alamat'],
    "tgllhr" => $_POST['tgllhr']
  );
}

$jsonfile = json_encode($datajson, JSON_PRETTY_PRINT);
$simpan = file_put_contents('mahasiswa.json', $jsonfile);
if ($simpan) {
  header('location:index.php');
}
