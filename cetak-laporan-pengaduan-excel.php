<?php
    include 'function.php';
    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];
    $datas = query("SELECT 
    data_akun.nama as nama,
    data_pengaduan_dan_aspirasi.no_hp as no_hp,
    data_pengaduan_dan_aspirasi.alamat as alamat,
    data_pengaduan_dan_aspirasi.tentang as tentang,
    data_pengaduan_dan_aspirasi.tanggal as tanggal,
    data_pengaduan_dan_aspirasi.waktu as waktu,
    data_pengaduan_dan_aspirasi.keterangan as keterangan
    FROM data_pengaduan_dan_aspirasi INNER JOIN data_akun ON data_pengaduan_dan_aspirasi.username_user=data_akun.username WHERE data_pengaduan_dan_aspirasi.kategori = 'Pengaduan' AND data_pengaduan_dan_aspirasi.keterangan='Selesai' AND data_pengaduan_dan_aspirasi.tanggal BETWEEN '$awal' AND '$akhir'");
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Pengaduan.xls");
?>
<p align="center" style="font-weight: bold;font-size:16pt">Laporan Pengaduan</p>
<p align="center" style="font-size:14pt"><?=tgl_indo($awal)?> - <?=tgl_indo($akhir)?></p>
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
    $no=1;
    foreach($datas as $data):
    ?>  
    <tr>
        <td><?=$no?></td>
        <td><?=$data['nama']?></td>
        <td><?=$data['no_hp']?></td>
        <td><?=$data['alamat']?></td>
        <td><?=$data['tentang']?></td>
        <td><?=tgl_indo($data['tanggal'])?></td>
        <td><?=$data['waktu']?></td>
    </tr>
    <?php
    $no++;
    endforeach;
    ?>
</table>