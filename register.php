<?php
    include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrasi Akun</title>
	<style>
	 body {
  background :url(img/background.jpeg);
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
	} 
	 </style>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
<br><br><br><br>
    <div class="container">

        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5 col-7">
                <div class="card-body p-0">
                    <div class="col">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="first_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Username" name="username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="repeat_password">
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                    Registrasi Akun
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <?php
        if(isset($_POST['register'])){
            $passwordRequest = $_POST['password'];
            $repeatpasswordRequest = $_POST['repeat_password'];
            if($passwordRequest == $repeatpasswordRequest){
                $usernameRequest = $_POST['username'];
                $usernameCheck = mysqli_query($conn,"SELECT*FROM data_akun WHERE username='$usernameRequest'");
                if(mysqli_num_rows($usernameCheck) === 0){
                    if(registrasi($_POST)>0){
                        echo'
                            <script type="text/javascript">
                                swal({
                                    title: "Berhasil",
                                    text: "Berhasil Registrasi Data",
                                    icon: "success",
                                    showConfirmButton: true,}).then(function(isConfirm){
                                        if(isConfirm){
                                            window.location.replace("login.php");
                                        }
                                    });
                            </script>
                        ';
                    }else{
                        echo'
                            <script type="text/javascript">
                                swal({
                                    title: "Gagal",
                                    text: "Gagal Registrasi Data",
                                    icon: "error",
                                    showConfirmButton: true,}).then(function(isConfirm){
                                        if(isConfirm){
                                            window.location.replace("login.php");
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
                                        window.location.replace("register.php");
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
                            text: "Gagal Password Tidak Cocok",
                            icon: "error",
                            showConfirmButton: true,}).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("register.php");
                                }
                            });
                    </script>
                ';
            }
        }
    ?>

</body>

</html>