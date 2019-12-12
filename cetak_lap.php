<?php
include('fpdf/fpdf.php');
$image1 = "fpdf/tutorial/logo.png";
$image3 = "fpdf/tutorial/logo.png";
$image2 = "fpdf/tutorial/logo.png";
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '16');
// $pdf->SetTextColor(255,0,0);
$pdf->image($image2, 5, 10, -300);
$pdf->image($image1, 175, 10, -200);
$pdf->image($image3, 50, 100, 120);
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(190, 7, 'PROGRAM STUDI TEKNIK INFORMATIKA', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR MAHASISWA MAKUL PEMROGRAMAN WEB DINAMIS 2019', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 7, 'Dosen Pengampu : Bambang Robiin, S.T.,M.T.', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 7, 'Asisten : Ardhi,Gontang,Kiky', 0, 1, 'C');

$pdf->Cell(10, 10, "Tanggal : " . date('d-m-Y', time()), 0, 1);

$pdf->SetFillColor(255, 100, 100);
$pdf->SetDrawColor(120, 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 8, '', 0, 1);
$pdf->Cell(30, 6, 'NIM', 1, 0);
$pdf->Cell(50, 6, 'NAMA MAHASISWA', 1, 0);
// $pdf->Cell(25, 6, 'J KEL', 1, 0);
$pdf->Cell(40, 6, 'ALAMAT', 1, 0);
$pdf->Cell(50, 6, 'EMAIL', 1, 1);

$pdf->SetFont('Arial', '', 10);
include 'koneksi.php';
$mahasiswa = mysqli_query($conn, "SELECT * from mahasiswa");
while ($row = mysqli_fetch_array($mahasiswa)) {
  $pdf->Cell(30, 6, $row['nim'], 1, 0);
  $pdf->Cell(50, 6, $row['nama'], 1, 0);
  // $pdf->Cell(25, 6, $row['jkel'], 1, 0);
  $pdf->Cell(40, 6, $row['alamat'], 1, 0);
  $pdf->Cell(50, 6, $row['email'], 1, 1);
}

$pdf->Cell(10, 10, "Tanggal : " . date('d-m-Y', time()), 0, 1, 'R');




$pdf->Output();
