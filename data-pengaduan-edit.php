<?php
    include 'function.php';
    $idGet = $_GET['id'];
    $checkData = mysqli_query($conn,"SELECT data_pengaduan_dan_aspirasi.id as id,
    data_akun.nama as nama,
    data_pengaduan_dan_aspirasi.no_hp as no_hp,
    data_pengaduan_dan_aspirasi.alamat as alamat,
    data_pengaduan_dan_aspirasi.tentang as tentang,
    data_pengaduan_dan_aspirasi.tanggal as tanggal,
    data_pengaduan_dan_aspirasi.waktu as waktu,
    data_pengaduan_dan_aspirasi.keterangan as keterangan
    FROM data_pengaduan_dan_aspirasi JOIN data_akun ON data_pengaduan_dan_aspirasi.username_user=data_akun.username WHERE data_pengaduan_dan_aspirasi.id = $idGet");
    $dataPengaduan = mysqli_fetch_assoc($checkData);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Pengaduan Edit</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            $page = 4;
            include 'view/sidebar.php'
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include 'view/topbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="data-pengaduan.php">Data Pengaduan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Edit Data</li>
                        </ol>
                    </nav>
                    <!-- DataTales Example -->
                    <div class="row justify-content-center">
                        <div class="card col-lg-8 shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary text-center">Form Edit Data Pengaduan</h6>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?=$dataPengaduan['id']?>">
                                    <div class="row form-group justify-content-center">
                                        <label for="" class="col-lg-3 col-form-label">Nama Pengadu</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" readonly value="<?=$dataPengaduan['nama']?>">
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <label for="" class="col-lg-3 col-form-label">Nomor HP</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" value="<?=$dataPengaduan['no_hp']?>">
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <label for="" class="col-lg-3 col-form-label">Alamat</label>
                                        <div class="col-lg-6">
                                            <textarea id="" cols="30" readonly class="form-control" rows="5"><?=$dataPengaduan['alamat']?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <label for="" class="col-lg-3 col-form-label">Tentang</label>
                                        <div class="col-lg-6">
                                        <textarea id="" cols="30" readonly class="form-control" rows="5"><?=$dataPengaduan['tentang']?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <label for="" class="col-lg-3 col-form-label">Tanggal</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" readonly value="<?=$dataPengaduan['tanggal']?>">
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <label for="" class="col-lg-3 col-form-label">Waktu</label>
                                        <div class="col-lg-6">
                                            <input type="time" class="form-control" readonly value="<?=$dataPengaduan['waktu']?>">
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <label for="" class="col-lg-3 col-form-label">Keterangan</label>
                                        <div class="col-lg-6">
                                            <select name="keterangan" class="form-control">
                                                <option value="<?=$dataPengaduan['keterangan']?>"><?=$dataPengaduan['keterangan']?></option>
                                                <?php
                                                    if($dataPengaduan['keterangan']=='Pending'){
                                                ?>
                                                <option value="Proses">Proses</option>
                                                <option value="Selesai">Selesai</option>
                                                <?php
                                                    }elseif($dataPengaduan['keterangan']=='Proses'){
                                                ?>
                                                <option value="Pending">Pending</option>
                                                <option value="Selesai">Selesai</option>
                                                <?php
                                                    }elseif($dataPengaduan['keterangan']=='Selesai'){
                                                ?>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-4 mb-3">
                                        <input type="submit" value="Update" name="add_data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                include 'view/footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
        include 'view/modalLogout.php';
        include 'view/script.php';
        if(isset($_POST['add_data'])){
            if(update_pengaduan_keterangan($_POST)>0){
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Mengubah Keterangan",
                            icon: "success",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-pengaduan.php");
                                }
                            });
                    </script>
                ';
            }else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Gagal Mengubah Keterangan",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-pengaduan.php");
                                }
                            });
                    </script>
                ';
            }
        }
    ?>

</body>

</html>