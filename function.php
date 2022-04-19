<?php
    $conn = mysqli_connect('127.0.0.1','root','password','vebi');
    date_default_timezone_set('Asia/Makassar');
    function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    function total_data_pengaduan_pending(){
        global $conn;
        $query = mysqli_query($conn,"SELECT*FROM data_pengaduan_dan_aspirasi WHERE keterangan='Pending' AND kategori='Pengaduan'");
        $result = mysqli_num_rows($query);
        return $result;
    }
    function total_data_pengaduan_proses(){
        global $conn;
        $query = mysqli_query($conn,"SELECT*FROM data_pengaduan_dan_aspirasi WHERE keterangan='Proses' AND kategori='Pengaduan'");
        $result = mysqli_num_rows($query);
        return $result;
    }
    function total_data_pengaduan_selesai(){
        global $conn;
        $query = mysqli_query($conn,"SELECT*FROM data_pengaduan_dan_aspirasi WHERE keterangan='Selesai' AND kategori='Pengaduan'");
        $result = mysqli_num_rows($query);
        return $result;
    }
    function total_data_pengaduan_pending_user($data){
        global $conn;
        $query = mysqli_query($conn,"SELECT*FROM data_pengaduan_dan_aspirasi WHERE keterangan='Pending' AND username_user='$data' AND kategori='Pengaduan'");
        $result = mysqli_num_rows($query);
        return $result;
    }
    function total_data_pengaduan_proses_user($data){
        global $conn;
        $query = mysqli_query($conn,"SELECT*FROM data_pengaduan_dan_aspirasi WHERE keterangan='Proses' AND username_user='$data' AND kategori='Pengaduan'");
        $result = mysqli_num_rows($query);
        return $result;
    }
    function total_data_pengaduan_selesai_user($data){
        global $conn;
        $query = mysqli_query($conn,"SELECT*FROM data_pengaduan_dan_aspirasi WHERE keterangan='Selesai' AND username_user='$data' AND kategori='Pengaduan'");
        $result = mysqli_num_rows($query);
        return $result;
    }
    function total_data_aspirasi(){
        global $conn;
        $query = mysqli_query($conn,"SELECT*FROM data_pengaduan_dan_aspirasi WHERE kategori='Aspirasi'");
        $result = mysqli_num_rows($query);
        return $result;
    }
    function add_data_admin($data){
        global $conn;
        $username = $data['username'];
        $password = $data['password'];
        $nama = $data['nama'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn,"INSERT INTO data_akun VALUES('$username','$password_hash','$nama','Admin','Setuju')");
        return mysqli_affected_rows($conn);
    }
    function edit_data_admin($data){
        global $conn;
        $username = $data['username'];
        $password = $data['password'];
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $nama = $data['nama'];
        if($password==""){
            mysqli_query($conn,"UPDATE data_akun SET nama='$nama' WHERE username='$username'");
            return mysqli_affected_rows($conn);
        }else{
            mysqli_query($conn,"UPDATE data_akun SET nama='$nama', password='$password_hash' WHERE username='$username'");
            return mysqli_affected_rows($conn);
        }
    }
    function delete_data_admin($data){
        global $conn;
        $username = $data['username'];
        mysqli_query($conn,"DELETE FROM data_akun WHERE username='$username'");
        return mysqli_affected_rows($conn);
    }
    function registrasi($data){
        global $conn;
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $fullname = $first_name;
        $fullname .= ' ';
        $fullname .= $last_name;
        $username = $data['username'];
        $password = $data['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn,"INSERT INTO data_akun VALUES('$username','$password_hash','$fullname','User','Pending')");
        return mysqli_affected_rows($conn);
    }
    function delete_data_aktif_user($data){
        global $conn;
        $username = $data['username'];
        mysqli_query($conn,"DELETE FROM data_akun WHERE username='$username'");
        return mysqli_affected_rows($conn);
    }
    function edit_data_pending($data){
        global $conn;
        $username = $data['username'];
        mysqli_query($conn,"UPDATE data_akun SET status='Setuju' WHERE username='$username'");
        return mysqli_affected_rows($conn);
    }
    function add_data_klasifikasi($data){
        global $conn;
        $username_user = $data['username_user'];
        $no_hp = $data['no_hp'];
        $alamat = $data['alamat'];
        $tanggal = date('Y-m-d');
        $waktu = date('h:i:s');
        $tentang = $data['tentang'];
        $convertKecil = strtolower($tentang);
        $arrayPecahTentang = explode(' ', $convertKecil);
        $arrayTentang = array_unique($arrayPecahTentang);
        $testarray = array_values($arrayTentang);
        $jumlahArrayPecahTentang = count($testarray);
        // keyword pengaduan
        $dataKeywordPengaduan = ['kecewa','tidak','berfungsi','bekerja','mengalami',
        'kecelakaan','lambat','keterlambatan','sesuai','cacat','dikembalikan',
        'proses','kerusakan','panas','kotor','bau','busuk','kurang','bisa','teliti','ketelitian',
        'periksa','kondisi'];
        $jumlahArrayPecahPengaduan = count($dataKeywordPengaduan);
        // keyword aspirasi
        $dataKeywordAspirasi = ['mudah','kemudahan','bisa','sebaiknya','baiknya','lebih',
        'alangkah','seharusnya','harusnya','harus','fasilitas','memohon','standar','kebijakan',
        'meninjau','tinjau','penyesuaian','menyesuaikan','menyatakan','kekeliruan','keliru'];
        $jumlahArrayPecahAspirasi = count($dataKeywordAspirasi);
        $pointPengaduan = 0;
        $pointAspirasi = 0;
        // looping check point
        for($nokeyPengaduan=0; $nokeyPengaduan<$jumlahArrayPecahPengaduan; $nokeyPengaduan++){
            $keyPengaduan = $dataKeywordPengaduan[$nokeyPengaduan];
            for($noWordPengaduan=0; $noWordPengaduan<$jumlahArrayPecahTentang; $noWordPengaduan++){
                $keywordTentang = $testarray[$noWordPengaduan];
                if($keyPengaduan==$keywordTentang){
                    $pointPengaduan += 1;
                }else{
                    $pointPengaduan;
                }
            }
        }
        for($nokeyAspirasi=0; $nokeyAspirasi<$jumlahArrayPecahAspirasi; $nokeyAspirasi++){
            $keyAspirasi = $dataKeywordAspirasi[$nokeyAspirasi];
            for($noWordAspirasi=0; $noWordAspirasi<$jumlahArrayPecahTentang; $noWordAspirasi++){
                $keywordTentang = $testarray[$noWordAspirasi];
                if($keyAspirasi==$keywordTentang){
                    $pointAspirasi += 1;
                }else{
                    $pointAspirasi;
                }
            }
        }
        $probabilityAspirasi = $pointAspirasi/count($testarray);
        $probabilityPengaduan = $pointPengaduan/count($testarray);
        if($probabilityAspirasi > $probabilityPengaduan){
            $kategori ='Aspirasi';
        }else{
            $kategori ='Pengaduan';
        }
        mysqli_query($conn,"INSERT INTO data_pengaduan_dan_aspirasi VALUES(NULL,'$username_user','$no_hp','$alamat','$tentang','$tanggal','$waktu','Pending','$kategori')");
        return mysqli_affected_rows($conn);
    }
    function update_pengaduan_keterangan($data){
        global $conn;
        $id = $data['id'];
        $keterangan = $data['keterangan'];
        mysqli_query($conn,"UPDATE data_pengaduan_dan_aspirasi SET keterangan='$keterangan' WHERE id='$id'");
        return mysqli_affected_rows($conn);
    }
