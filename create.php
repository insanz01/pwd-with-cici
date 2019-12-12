<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT *FROM mahasiswa ORDER BY nim DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($query) == 0) {
  echo '<tbody>
		    <tr class="active">
		      <td colspan="5">Tidak ada data yang di entrikan </td>
		    </tr>
		  </tbody>';
} else {
  while ($data = mysqli_fetch_array($query)) {
    $datajson[] = array(
      "nim" => $data['nim'],
      "nama" => $data['nama'],
      "email" => $data['email'],
      "jkel" => $data['jkel'],
      "alamat" => $data['alamat'],
      "tgllhr" => $data['tgllhr']

      //echo '<td><a class="btn btn-primary" href="updatemahasiswa.php?nim='.$data['nim'].'">Update</a>
      //<a class="btn btn-danger" href="hapusmahasiswa.php?nim='.$data['nim'].'">Delete</a></tr>';
      //echo '</tr>';
      //$no++;
    );
  }
  $jsonfile = json_encode($datajson, JSON_PRETTY_PRINT);
  $simpan = file_put_contents('mahasiswa.json', $jsonfile);
  if ($simpan) {
    header('location:index.php');
  }
}
