<?php
    session_start();
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

    <title>Login</title>
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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                        <form class="user" action="" method="POST">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Username" name="username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" name="password">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
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
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $perintah = "SELECT * FROM data_akun WHERE username = '$username' AND status='Setuju'";
            $hasil = mysqli_query($conn,$perintah);
            $rowAdmin = mysqli_fetch_assoc($hasil);
            if(mysqli_num_rows($hasil) === 1 && $rowAdmin['role']=='User'){
                if(password_verify($password, $rowAdmin['password'])){
                    $_SESSION['username'] = $username;
                    echo'
                        <script type="text/javascript">
                            swal({
                                title: "Berhasil",
                                text: "Berhasil Login",
                                icon: "success",
                                showConfirmButton: true,
                            }).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("index-user.php");
                                }else{
                                    //if no clicked => do something else
                                }
                            });
                        </script>
                    ';
                }
                else{
                    echo'
                        <script type="text/javascript">
                            swal({
                                title: "Gagal",
                                text: "Username dan Password Salah",
                                icon: "error",
                                showConfirmButton: true,
                            }).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("login.php");
                                }else{
                                    //if no clicked => do something else
                                }
                            });
                        </script>
                    ';
                }
            }
            elseif(mysqli_num_rows($hasil) === 1 && $rowAdmin['role']=='Admin'){
                if(password_verify($password, $rowAdmin['password'])){
                    $_SESSION['username'] = $username;
                    echo'
                        <script type="text/javascript">
                            swal({
                                title: "Berhasil",
                                text: "Berhasil Login",
                                icon: "success",
                                showConfirmButton: true,
                            }).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("index.php");
                                }else{
                                    //if no clicked => do something else
                                }
                            });
                        </script>
                    ';
                }
                else{
                    echo'
                        <script type="text/javascript">
                            swal({
                                title: "Gagal",
                                text: "Username dan Password Salah",
                                icon: "error",
                                showConfirmButton: true,
                            }).then(function(isConfirm){
                                if(isConfirm){
                                    window.location.replace("login.php");
                                }else{
                                    //if no clicked => do something else
                                }
                            });
                        </script>
                    ';
                }
            }
            else{
                echo'
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Username dan Password Salah",
                            icon: "error",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("login.php");
                            }else{
                                //if no clicked => do something else
                            }
                        });
                    </script>
                ';
            }
        }
    ?>

</body>

</html>