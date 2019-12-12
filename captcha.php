<?php
session_start();
$random_alpha = md5(rand()); // acak random string dengan metode md5
$captcha_code = substr($random_alpha, 0, 6); // ambil string captcha dengan memotong 6 karakter
$_SESSION['captcha_code'] = $captcha_code; // menyimpan ke dalam session
$target_layer = imagecreatetruecolor(70, 30); // bermanfaat jika kita tidak memilki sumber gambar asli yang ingin kita manipulasi parameter (width dan height)
$captcha_background = imagecolorallocate($target_layer, 225, 160, 119);

imagefill($target_layer, 0, 0, $captcha_background);
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg"); // mengenalkan bahwa akan mengirim konten file berupa gambar
imagejpeg($target_layer);
