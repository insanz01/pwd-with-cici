$(document).ready(function () {
  $('#tombol-cari').hide();
  $('#keyword').on('keyup', function () {
    $('#container').load('admin/js/search.php?keyword=' + $('#keyword').val());
  });
});