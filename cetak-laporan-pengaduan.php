<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'function.php';
$whereFilter = '';
if (isset($_POST['awal']) && isset($_POST['akhir'])) {
  $whereFilter = " AND data_pengaduan_dan_aspirasi.tanggal BETWEEN '{$_POST['awal']}' AND '{$_POST['akhir']}' ";
}
$query = "SELECT data_pengaduan_dan_aspirasi.id as id,data_akun.nama as nama,data_pengaduan_dan_aspirasi.no_hp as no_hp,data_pengaduan_dan_aspirasi.alamat as alamat,data_pengaduan_dan_aspirasi.tentang as tentang,data_pengaduan_dan_aspirasi.tanggal as tanggal,data_pengaduan_dan_aspirasi.waktu as waktu,data_pengaduan_dan_aspirasi.keterangan as keterangan FROM data_pengaduan_dan_aspirasi JOIN data_akun ON data_pengaduan_dan_aspirasi.username_user=data_akun.username WHERE data_pengaduan_dan_aspirasi.kategori='Pengaduan' " . $whereFilter . " ORDER BY data_pengaduan_dan_aspirasi.keterangan ASC";
$sql = mysqli_query($conn, $query);
$result = array();

while ($row = mysqli_fetch_array($sql)) {
  array_push($result, array('id' => $row[0], 'nama' => $row[1], 'no_hp' => $row[2], 'alamat' => $row[3], 'tentang' => $row[4], 'tanggal' => $row[5], 'waktu' => $row[6], 'keterangan' => $row[7]));
}
if ($_POST['file'] == "pdf") {
  $mpdf = new \Mpdf\Mpdf();
  $html = '<!DOCTYPE html>
      <html lang="en">
      <head>
          <title>Laporan Pengaduan</title>
          <style>
              body{
                  color: black;
                  font-family: "Roboto", Courier, monospace;
                  padding-top: 20px;
                  border: 1px solid black;
                  height:300px;
              }
  
              h1{
                  text-align: center;
              }
              h4{
                  text-align: center;
                  font-weight: 400;
              }
              table{
                  margin-bottom: 20px;
              }
              th{
                  text-align: left;
              }
              .bg-color{
                  background-color: rgb(197, 197, 197);
              }
              p{
                  font-size:10px;
                  padding-top:-10px;
              }
              .class-tr{
                  background-color: rgb(228, 228, 228);
              }
          </style>
      </head>
      <body>
          <h1>Laporan Pengaduan</h1>
          <h4>' . tgl_indo($_POST['awal']) . ' - ' . tgl_indo($_POST['akhir']) . '</h4>
          <hr>
          <table border="1" align="center" cellpadding="10" cellspacing="0">
              <tr class="class-tr">
                  <th>No</th>
                  <th>Nama</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <th>Tentang</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
              </tr>';
  $no = 1;
  foreach ($result as $data) :
    $html .= '<tr>
              <td style="vertical-align: top">' . $no . '</td>
              <td style="vertical-align: top">' . $data['nama'] . '</td>
              <td style="vertical-align: top">' . $data['no_hp'] . '</td>
              <td style="vertical-align: top">' . $data['alamat'] . '</td>
              <td style="vertical-align: top">' . $data['tentang'] . '</td>
              <td style="vertical-align: top">' . tgl_indo($data['tanggal']) . '</td>
              <td style="vertical-align: top">' . $data['waktu'] . '</td>
              </tr>';
    $no++;
  endforeach;
  $html .= '
              </table>
          <hr>
      </body>
      </html>';
  $mpdf->WriteHTML($html);
  $LaporanPengaduan = "Laporan Pengaduan.pdf";
  // $mpdf->Output();
  $mpdf->Output($LaporanPengaduan, 'D');
} else { ?>
  <?php header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Laporan Pengaduan.xls"); ?>
  <p align="center" style="font-weight: bold;font-size:16pt">Laporan Pengaduan</p>
  <p align="center" style="font-size:14pt"><?= tgl_indo($_POST['awal']) ?> - <?= tgl_indo($_POST['akhir']) ?></p>
  <table border="1" align="center" cellspacing="0" cellpadding="10">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>No HP</th>
      <th>Alamat</th>
      <th>Tentang</th>
      <th>Tanggal</th>
      <th>Waktu</th>
    </tr>
    <?php
    $no = 1;
    foreach ($result as $data) :
    ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['no_hp'] ?></td>
        <td><?= $data['alamat'] ?></td>
        <td><?= $data['tentang'] ?></td>
        <td><?= tgl_indo($data['tanggal']) ?></td>
        <td><?= $data['waktu'] ?></td>
      </tr>
  <?php
      $no++;
    endforeach;
  } ?>