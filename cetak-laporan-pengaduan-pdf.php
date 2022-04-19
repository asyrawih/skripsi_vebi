<?php
    require_once __DIR__ . '/vendor/autoload.php';
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
        <h4>'.tgl_indo($awal).' - '.tgl_indo($akhir).'</h4>
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
            $no=1;
            foreach($datas as $data):
            $html .='<tr>
            <td>'.$no.'</td>
            <td>'.$data['nama'].'</td>
            <td>'.$data['no_hp'].'</td>
            <td>'.$data['alamat'].'</td>
            <td>'.$data['tentang'].'</td>
            <td>'.tgl_indo($data['tanggal']).'</td>
            <td>'.$data['waktu'].'</td>
            </tr>';
            $no++;
            endforeach;
            $html .='
            </table>
        <hr>
    </body>
    </html>';
    $mpdf->WriteHTML($html);
    $LaporanPengaduan = "Laporan Pengaduan.pdf";
    // $mpdf->Output();
    $mpdf->Output($LaporanPengaduan,'D');
