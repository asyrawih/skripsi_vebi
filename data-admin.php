<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    include 'function.php';
    $admins = query("SELECT*FROM data_akun WHERE role='Admin' ORDER BY nama ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Admin</title>

    <!-- Custom fonts for this template -->
    <?php
        include 'view/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            $page = 2;
            include 'view/sidebar.php';
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
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">No</th>
                                            <th class="align-middle">Nama</th>
                                            <th class="align-middle">Username</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach($admins as $admin):
                                        ?>
                                        <tr>
                                            <td class="align-middle"><?=$no?></td>
                                            <td class="align-middle"><?=$admin['nama']?></td>
                                            <td class="align-middle"><?=$admin['username']?></td>
                                            <?php
                                                if($admin['username'] == $_SESSION['username']){
                                            ?>
                                            <td class="text-center align-middle">
                                                
                                            </td>
                                            <?php
                                                }else{
                                            ?>
                                            <td class="text-center align-middle">
                                                <a href="" type="button" data-toggle="modal" data-target="#edit_data<?=$admin['username']?>" class="btn btn-info btn-sm">Edit<i class="fas fa-edit ml-2"></i></a>
                                                <a href="" type="button" data-toggle="modal" data-target="#delete_data<?=$admin['username']?>" class="btn btn-danger btn-sm">Delete<i class="fas fa-trash-alt ml-2"></i></a>
                                            </td>
                                            <?php
                                                }
                                            ?>
                                                <div class="modal fade" id="delete_data<?=$admin['username']?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Data</h4>
                                                                <button class="close" type="button" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" role="form" method="post" autocomplete="off">
                                                                    <?php
                                                                        $username = $admin['username'];
                                                                        $edits = query("SELECT*FROM data_akun WHERE username='$username'");
                                                                        foreach($edits as $edit):
                                                                    ?>
                                                                    <input type="hidden" name="username" value="<?=$edit['username']?>">
                                                                    <p>Yakin ingin menghapus data ?</p>
                                                                    <div class="row justify-content-center mt-4 mb-3">
                                                                        <button class="btn btn-secondary mr-2" type="button" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" name="delete_data" class="btn btn-danger ml-2">Hapus</button>
                                                                    </div>
                                                                    <?php
                                                                        endforeach;
                                                                    ?>
                                                                </form>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="edit_data<?=$admin['username']?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Ubah Data</h4>
                                                                <button class="close" type="button" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" role="form" method="POST" autocomplete="off">
                                                                    <?php
                                                                        $username = $admin['username'];
                                                                        $edits = query("SELECT*FROM data_akun WHERE username='$username'");
                                                                        foreach($edits as $edit):
                                                                    ?>
                                                                        <input type="hidden" name="username" value="<?=$edit['username']?>">
                                                                        <div class="form-group row mt-2">
                                                                            <label for="nama" class="col-4 col-form-label">Nama</label>
                                                                            <div class="col-8">
                                                                                <input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama" value="<?=$edit['nama']?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-2">
                                                                            <label for="password" class="col-4 col-form-label">Password</label>
                                                                            <div class="col-8">
                                                                                <input type="text" name="password" id="password" class="form-control" placeholder="Password" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="row justify-content-end mt-4 mb-3">
                                                                            <button type="submit" name="edit_data" class="btn btn-info">Update</button>
                                                                            <button type="button" class="btn btn-secondary mr-3 ml-2" data-dismiss="modal">Tutup</button>
                                                                        </div>
                                                                    <?php
                                                                        endforeach;
                                                                    ?>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                            <div class="form-group row mt-2">
                                                                <label for="nama" class="col-4 col-form-label">Nama</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="nama" id="nama" required placeholder="Nama">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-2">
                                                                <label for="username" class="col-4 col-form-label">Username</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="username" id="username" required placeholder="Username">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-2">
                                                                <label for="password" class="col-4 col-form-label">Password</label>
                                                                <div class="col-8">
                                                                    <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
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
            $usernameRequest = $_POST['username'];
            $usernameCheck = mysqli_query($conn,"SELECT*FROM data_akun WHERE username='$usernameRequest'");
            if(mysqli_num_rows($usernameCheck) === 0){
                if(add_data_admin($_POST)>0){
                    echo'
                        <script type="text/javascript">
                            swal({
                                title: "Berhasil",
                                text: "Berhasil Menambahkan Data",
                                icon: "success",
                                showConfirmButton: true,}).then(function(isConfirm){
                                    if(isConfirm){
                                        window.location.replace("data-admin.php");
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
                                        window.location.replace("data-admin.php");
                                    }
                                });
                        </script>
                    ';
                }
            }else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Gagal Username Sudah Ada",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-admin.php");
                                }
                            });
                    </script>
                ';
            }
        }
        if(isset($_POST['delete_data'])){
            if(delete_data_admin($_POST)>0){
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menghapus Data",
                            icon: "success",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-admin.php");
                                }
                            });
                    </script>
                ';
            }else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Gagal Menghapus Data",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-admin.php");
                                }
                            });
                    </script>
                ';
            }
        }
        if(isset($_POST['edit_data'])){
            if(edit_data_admin($_POST)>0){
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Mengubah Data",
                            icon: "success",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-admin.php");
                                }
                            });
                    </script>
                ';
            }else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Gagal Mengubah Data",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-admin.php");
                                }
                            });
                    </script>
                ';
            }
        }
    ?>

</body>

</html>