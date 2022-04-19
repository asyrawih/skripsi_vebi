<?php
 require_once __DIR__ . '/vendor/autoload.php';
    include 'function.php';	
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    $sql = query("SELECT 
    data_pengaduan_dan_aspirasi.id as id,
    data_akun.nama as nama,
    data_pengaduan_dan_aspirasi.no_hp as no_hp,
    data_pengaduan_dan_aspirasi.alamat as alamat,
    data_pengaduan_dan_aspirasi.tentang as tentang,
    data_pengaduan_dan_aspirasi.tanggal as tanggal,
    data_pengaduan_dan_aspirasi.waktu as waktu,
    data_pengaduan_dan_aspirasi.keterangan as keterangan
    FROM data_pengaduan_dan_aspirasi INNER JOIN data_akun ON data_pengaduan_dan_aspirasi.username_user=data_akun.username WHERE data_pengaduan_dan_aspirasi.kategori = 'Aspirasi' AND data_pengaduan_dan_aspirasi.tanggal BETWEEN '$awal' AND '$akhir'");
       foreach($sql as $fetch):
	   ?>
		<tr>
			<td><?php echo $fetch['id']?></td>
			<td><?php echo $fetch['nama']?></td>
			<td><?php echo $fetch['no_hp']?></td>
			<td><?php echo $fetch['alamat']?></td>
			<td><?php echo $fetch['tentang']?></td>
			<td><?php echo tgl_indo($fetch['tanggal'])?></td>
			<td><?php echo $fetch['waktu']?></td>
		</tr>
		<?php
		 endforeach;
?>

