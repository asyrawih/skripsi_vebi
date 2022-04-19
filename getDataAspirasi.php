<?php
if (!isset($_POST['tampil'])) {
  include 'function.php';
  $whereFilter = '';
  if (isset($_POST['awal']) && isset($_POST['akhir'])) {
    $whereFilter = " AND data_pengaduan_dan_aspirasi.tanggal BETWEEN '{$_POST['awal']}' AND '{$_POST['akhir']}' ";
  }

  $sql = mysqli_query($conn, "SELECT 
    data_pengaduan_dan_aspirasi.id as id,
    data_akun.nama as nama,
    data_pengaduan_dan_aspirasi.no_hp as no_hp,
    data_pengaduan_dan_aspirasi.alamat as alamat,
    data_pengaduan_dan_aspirasi.tentang as tentang,
    data_pengaduan_dan_aspirasi.tanggal as tanggal,
    data_pengaduan_dan_aspirasi.waktu as waktu,
    data_pengaduan_dan_aspirasi.keterangan as keterangan
    FROM data_pengaduan_dan_aspirasi JOIN data_akun ON data_pengaduan_dan_aspirasi.username_user=data_akun.username WHERE data_pengaduan_dan_aspirasi.kategori='Aspirasi' " . $whereFilter);
  $result = array();

  while ($row = mysqli_fetch_array($sql)) {
    array_push($result, array('id' => $row[0], 'nama' => $row[1], 'no_hp' => $row[2], 'alamat' => $row[3], 'tentang' => $row[4], 'tanggal' => $row[5], 'waktu' => $row[6]));
  }

  echo json_encode(array("result" => $result));
}
?>


<?php
if (isset($_POST['tampil'])) {
  include 'function.php';
  $awal = $_POST['awal'];
  $akhir = $_POST['akhir'];
  $whereFilter = '';
  if (isset($_POST['awal']) && isset($_POST['akhir'])) {
    $whereFilter = " AND data_pengaduan_dan_aspirasi.tanggal BETWEEN '{$_POST['awal']}' AND '{$_POST['akhir']}' ";
  }
  $sql = mysqli_query($conn, "SELECT 
	 data_pengaduan_dan_aspirasi.id as id,
    data_akun.nama as nama,
    data_pengaduan_dan_aspirasi.no_hp as no_hp,
    data_pengaduan_dan_aspirasi.alamat as alamat,
    data_pengaduan_dan_aspirasi.tentang as tentang,
    data_pengaduan_dan_aspirasi.tanggal as tanggal,
    data_pengaduan_dan_aspirasi.waktu as waktu,
    data_pengaduan_dan_aspirasi.keterangan as keterangan
    FROM data_pengaduan_dan_aspirasi INNER JOIN data_akun ON data_pengaduan_dan_aspirasi.username_user=data_akun.username WHERE data_pengaduan_dan_aspirasi.kategori = 'Aspirasi' " .  $whereFilter);
  $result = array();

  while ($row = mysqli_fetch_array($sql)) {
    array_push($result, array('id' => $row[0], 'nama' => $row[1], 'no_hp' => $row[2], 'alamat' => $row[3], 'tentang' => $row[4], 'tanggal' => $row[5], 'waktu' => $row[6]));
  }

  echo json_encode(array("result" => $result));
}
?>

