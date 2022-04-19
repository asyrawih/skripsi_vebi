<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    } 
    include 'function.php';
    $user_id = $_SESSION['username'];
    $dataLaporans = query("SELECT*FROM data_pengaduan_dan_aspirasi WHERE username_user='$user_id' ORDER BY tanggal ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Pengaduan dan Aspirasi</title>

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
            $page = 2;
            include 'view/sidebar-user.php'
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
                    <div class="row justify-content-end mr-2 mb-3">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alamat</th>
                                            <th>Tentang</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach($dataLaporans AS $dataLaporan):
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$dataLaporan['alamat']?></td>
                                            <td><?=$dataLaporan['tentang']?></td>
                                            <td><?=tgl_indo($dataLaporan['tanggal'])?></td>
                                            <td><?=$dataLaporan['waktu']?></td>
                                            <td><?=$dataLaporan['keterangan']?></td>
                                        </tr>
                                        <?php
                                            $no++;
                                            endforeach;
                                        ?>
                                    </tbody>
                                    <div id="tambah" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Tambah Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="#" method="post" autocomplete="off" id="tambah">
                                                        <input type="hidden" name="username_user" value="<?=$user_id?>">    
                                                        <div class="form-group row mt-2">
                                                            <label class="col-4 col-form-label">No HP</label>
                                                            <div class="col-8">
                                                                <input type="number" class="form-control" name="no_hp" required placeholder="08237xxxxxxx">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-2">
                                                            <label class="col-4 col-form-label">Alamat</label>
                                                            <div class="col-8">
                                                                <textarea name="alamat" class="form-control" cols="30" rows="3" placeholder="Alamat"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-2">
                                                            <label class="col-4 col-form-label">Tentang</label>
                                                            <div class="col-8">
                                                                <textarea name="tentang" class="form-control" cols="30" rows="7" placeholder="Tentang"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center mt-4 mb-3">
                                                            <input type="submit" value="Tambah" name="add_data" class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </table>
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
            if(add_data_klasifikasi($_POST)>0){
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menambahkan Data",
                            icon: "success",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("form-pengaduan-dan-aspirasi.php");
                                }
                            });
                    </script>
                ';
            }else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Gagal Menambahkan Data",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("form-pengaduan-dan-aspirasi.php");
                                }
                            });
                    </script>
                ';
            }
        }
    ?>
</body>

</html>