<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Data Aspirasi</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
    $page = 5;
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Aspirasi</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <form action="/skripsi/cetak-laporan-aspirasi.php" method="POST" id="filter-saya">
                  <div class="col-12 form-group row mr-5">
                    <div class="col-4">
                      <input type="date" class="form-control" name="awal" required>
                    </div>
                    <div class="col-4">
                      <input type="date" class="form-control" name="akhir" required>
                    </div>
                    <div class="col-2">
                      <select name="file" class="form-control">
                        <option value="pdf">Pdf</option>
                        <option value="excel">Excel</option>
                      </select>
                    </div>  
                    <div class="col-2">
                      <div class="btn-group">
                        <input type="submit" class="btn btn-primary" id="tampilkan" value="Tampilkan">
                        <input type="submit" class="btn btn-success" name="submitcetak" value="Cetak Laporan">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama/Nama Perusahaan</th>
                      <th>No HP</th>
                      <th>Alamat</th>
                      <th>Tentang</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                    </tr>
                  </thead>
                  <tbody>

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
  <?php
  include 'view/modalLogout.php';
  include 'view/script.php';
  include 'function.php';
  if (isset($_POST['submitcetak'])) {
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    $file = $_POST['file'];
    if (empty($awal) && empty($akhir)) {
      echo '
                        <script type="text/javascript">
                        setTimeout(function(){
                        swal({
                            title: "Gagal Mencetak",
                            icon: "error",
                            timer:3000,
                            showConfirmButton:true
                        });
                        },10);
                        window.setTimeout(function(){
                            window.location.replace("data-aspirasi.php");
                        },3000);
                        </script>
                    ';
    } else if (empty($awal) || empty($akhir)) {
      echo '
                        <script type="text/javascript">
                        setTimeout(function(){
                        swal({
                            title: "Gagal Mencetak",
                            icon: "error",
                            timer:3000,
                            showConfirmButton:true
                        });
                        },10);
                        window.setTimeout(function(){
                            window.location.replace("data-aspirasi.php");
                        },3000);
                        </script>
                    ';
    } else {
      if ($file == 'excel') {
        echo '
                        <script type="text/javascript">
                        setTimeout(function(){
                        swal({
                            title: "Mohon Ditunggu",
                            icon: "success",
                            timer:3000,
                            showConfirmButton:true
                        });
                        },10);
                        window.setTimeout(function(){
                            window.location.replace("cetak-laporan-aspirasi-excel.php?awal=' . $awal . '&akhir=' . $akhir . '");
                        },3000);
                        </script>
                    ';
      } else {
        echo '
                        <script type="text/javascript">
                        setTimeout(function(){
                        swal({
                            title: "Mohon Ditunggu",
                            icon: "success",
                            timer:3000,
                            showConfirmButton:true
                        });
                        },10);
                        window.setTimeout(function(){
                            window.location.replace("cetak-laporan-aspirasi.php?awal=' . $awal . '&akhir=' . $akhir . '");
                        },3000);
                        </script>
                    ';
      }
    }
  } else if (isset($_POST['tampil'])) {
    include 'view/modalLogout.php';
    include 'view/script.php';
    include 'function.php';
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    echo '
			  window.setTimeout(function(){
                            window.location.replace("tampilDataAspirasi.php?awal=' . $awal . '&akhir=' . $akhir . '");
                        },3000);
                        </script>';
  } else {
    echo "";
  }
  ?>
  <script type="text/javascript">
    $(document).ready(function() {
      update();
    });

    function selesai() {
      setTimeout(() => {
        update();
        selesai();
      }, 1000);
    }

    function update() {
      $.getJSON("getDataAspirasi.php", function(data) {
        $("tbody").empty();
        nomor = 1;
        $.each(data.result, function() {
          $("tbody").append("<tr><td>" + nomor + "</td><td>" + this['nama'] + "</td><td>" + this['no_hp'] + "</td><td>" + this['alamat'] + "</td><td>" + this['tentang'] + "</td><td>" + this['tanggal'] + "</td><td>" + this['waktu'] + "</td></tr>");
          nomor++;
        })
      })
    }
    $("#tampilkan").click(function(e) {
      e.preventDefault();
      let awal = $('[name=awal]').val(),
        akhir = $('[name=akhir]').val()
      $.ajax({
          method: "POST",
          url: "getDataAspirasi.php",
          data: {
            awal,
            akhir
          },
        })
        .done(function(data) {
          const jsonData = JSON.parse(data);
          $("tbody").empty();
          nomor = 1;
          $("tbody").html(jsonData.result.map(hsl => {
            return `<tr><td>${nomor++} </td><td>${hsl.nama} </td><td>${hsl.no_hp} </td><td>${hsl.alamat} </td><td>${hsl.tentang} </td><td>${hsl.tanggal} </td><td>${hsl.waktu} </td><td  class='text-center align-middle'><a href='data-pengaduan-edit.php?id=${hsl.id}' class='btn btn-info btn-sm'>Edit<i class='fas fa-edit ml-2'></i></a></td></tr>`;
          }).reduce((a, b) => a + b, ""));
        });

    })
  </script>

</body>

</html>