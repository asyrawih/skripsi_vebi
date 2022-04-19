<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    include 'function.php';
    $users = query("SELECT*FROM data_akun WHERE role='User' AND status='Setuju' ORDER BY nama ASC");
    $userPendings = query("SELECT*FROM data_akun WHERE role='User' AND status='Pending' ORDER BY nama ASC");
    $userCheckPendings = mysqli_query($conn,"SELECT*FROM data_akun WHERE role='User' AND status='Pending'");
    $userCheck = mysqli_query($conn,"SELECT*FROM data_akun WHERE role='User' AND status='Setuju'");
    $hasilDataPending = mysqli_num_rows($userCheckPendings);
    $hasilData = mysqli_num_rows($userCheck);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data User</title>

    <?php
        include 'view/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            $page = 3;
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Akun Pengguna Jasa Aktif</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($hasilData==0){
                                        ?>
                                            <tr>
                                                <td class="text-center" colspan="4">No Data</td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            $no =1;
                                            foreach($users as $user):
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$user['nama']?></td>
                                            <td><?=$user['username']?></td>
                                            <td class="text-center">
                                                <a href="" type="button" data-toggle="modal" data-target="#delete_data<?=$user['username']?>" class="btn btn-danger btn-sm">Delete<i class="fas fa-trash-alt ml-2"></i></a>
                                            </td>
                                            <div class="modal fade" id="delete_data<?=$user['username']?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Data</h4>
                                                            <button class="close" type="button" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" role="form" method="post" autocomplete="off">
                                                                <?php
                                                                    $username = $user['username'];
                                                                    $edits = query("SELECT*FROM data_akun WHERE username='$username'");
                                                                    foreach($edits as $edit):
                                                                ?>
                                                                <input type="hidden" name="username" value="<?=$edit['username']?>">
                                                                <p>Yakin ingin menghapus akun ?</p>
                                                                <div class="row justify-content-center mt-4 mb-3">
                                                                    <button class="btn btn-secondary mr-2" type="button" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" name="delete_data_user" class="btn btn-danger ml-2">Hapus</button>
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
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Akun Pengguna Jasa Pending</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($hasilDataPending==0){
                                        ?>
                                            <tr>
                                                <td class="text-center" colspan="4">No Data</td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            $noPending =1;
                                            foreach($userPendings as $userPending):
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$userPending['nama']?></td>
                                            <td><?=$userPending['username']?></td>
                                            <td class="text-center">
                                                <a href="" type="button" data-toggle="modal" data-target="#edit_data<?=$userPending['username']?>" class="btn btn-info btn-sm">Edit<i class="fas fa-edit ml-2"></i></a>
                                                <a href="" type="button" data-toggle="modal" data-target="#delete_data<?=$userPending['username']?>" class="btn btn-danger btn-sm">Delete<i class="fas fa-trash-alt ml-2"></i></a>
                                            </td>
                                                <div class="modal fade" id="delete_data<?=$userPending['username']?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Data</h4>
                                                                <button class="close" type="button" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" role="form" method="post" autocomplete="off">
                                                                    <?php
                                                                        $username = $userPending['username'];
                                                                        $edits = query("SELECT*FROM data_akun WHERE username='$username'");
                                                                        foreach($edits as $edit):
                                                                    ?>
                                                                    <input type="hidden" name="username" value="<?=$edit['username']?>">
                                                                    <p>Yakin ingin menghapus akun ?</p>
                                                                    <div class="row justify-content-center mt-4 mb-3">
                                                                        <button class="btn btn-secondary mr-2" type="button" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" name="delete_data_user" class="btn btn-danger ml-2">Hapus</button>
                                                                    </div>
                                                                    <?php
                                                                        endforeach;
                                                                    ?>
                                                                </form>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="edit_data<?=$userPending['username']?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Setujui Data</h4>
                                                                <button class="close" type="button" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" role="form" method="post" autocomplete="off">
                                                                    <?php
                                                                        $username = $userPending['username'];
                                                                        $edits = query("SELECT*FROM data_akun WHERE username='$username'");
                                                                        foreach($edits as $edit):
                                                                    ?>
                                                                    <input type="hidden" name="username" value="<?=$edit['username']?>">
                                                                    <p>Yakin ingin menyetujui akun ?</p>
                                                                    <div class="row justify-content-center mt-4 mb-3">
                                                                        <button class="btn btn-secondary mr-2" type="button" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" name="edit_data_user" class="btn btn-primary ml-2">Setuju</button>
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
                                            $noPending++;
                                            endforeach;
                                        ?>
                                    </tbody>
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

    <!-- Logout Modal-->
    <?php
        include 'view/modalLogout.php';
        include 'view/script.php';
        if(isset($_POST['delete_data_user'])){
            if(delete_data_aktif_user($_POST)>0){
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menghapus Akun",
                            icon: "success",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-user.php");
                                }
                            });
                    </script>
                ';
            }else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Gagal Menghapus Akun",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-user.php");
                                }
                            });
                    </script>
                ';
            }
        }
        if(isset($_POST['edit_data_user'])){
            if(edit_data_pending($_POST)>0){
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menyetujui Akun",
                            icon: "success",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-user.php");
                                }
                            });
                    </script>
                ';
            }else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Gagal Menyetujui Akun",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("data-user.php");
                                }
                            });
                    </script>
                ';
            }
        }
    ?>

</body>

</html>