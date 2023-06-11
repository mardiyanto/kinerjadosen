<?php
// Koneksi ke database
include 'config/connection.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Kinerja</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!--charts js-->
  <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  
  <style type="text/css">
    body{

    }
    .atas{
      color: white;
    }

    /*footer{
      margin-top: -100px;
      width: 100%;
      position: relative;
    }*/
    .wrapper{
      height: 90%;
    }
  </style>
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">


  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">GMI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E</b>-Kinerja</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
   
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
<?php
  // Mendapatkan pertanyaan dari tabel pertanyaan
  $query_pertanyaan = "SELECT * FROM pertanyaan WHERE status_pertanyaan = 'pilihan'";
  $result_pertanyaan = mysqli_query($koneksi, $query_pertanyaan);
  
  // Memeriksa apakah form telah disubmit
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Memeriksa apakah nilai-nilai yang dibutuhkan telah ada
      if (isset($_POST["id_mahasiswa"]) && isset($_POST["id_dosen"]) && isset($_POST["id_matakul"]) && isset($_POST["id_semester"]) && isset($_POST["tahun"])) {
          $id_mahasiswa = $_POST["id_mahasiswa"];
          $id_dosen = $_POST["id_dosen"];
          $id_matakul = $_POST["id_matakul"];
          $id_semester = $_POST["id_semester"];
          $tahun = $_POST["tahun"];
  
          // Menyimpan penilaian ke dalam tabel penilaian
          foreach ($_POST["jawaban"] as $id_pertanyaan => $jawaban) {
              $query_jawaban = "SELECT nilai_jawaban FROM jawaban WHERE id_jawaban = '$jawaban'";
              $result_jawaban = mysqli_query($koneksi, $query_jawaban);
              $row_jawaban = mysqli_fetch_assoc($result_jawaban);
              $nilai_jawaban = $row_jawaban["nilai_jawaban"];
              
              $query_simpan = "INSERT INTO penilaian (id_jawaban, id_mahasiswa, id_dosen, id_matakul, nilai, id_semester, tahun) VALUES ('$jawaban', '$id_mahasiswa', '$id_dosen', '$id_matakul', '$nilai_jawaban', '$id_semester', '$tahun')";
              mysqli_query($koneksi, $query_simpan);
          }
  
          // Redirect ke halaman sukses atau halaman lain yang diinginkan
          header("Location: sukses.php");
          exit();
      } else {
          echo "Form tidak lengkap!";
      }
  }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content">


    <!-- Main content -->
    <section class="content">
<div class='row'>
<div class='col-lg-12'>
    <div class='panel panel-default'>
        <div class='panel-heading'>INFORMASI 
        </div>     

 <div class="box box-warning">
              <div class="box-header with-border">
                  <h3 class="box-title">General Elements</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="form-group">
                      <label>Select</label>
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
              </div>
 
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <!-- Input mahasiswa, dosen, matakul, semester, tahun -->
        <div class="box box-success">
        <input type="text" name="id_mahasiswa" placeholder="ID Mahasiswa"><br>
        <input type="text" name="id_dosen" placeholder="ID Dosen"><br>
        <input type="text" name="id_matakul" placeholder="ID Mata Kuliah"><br>
        <input type="text" name="id_semester" placeholder="ID Semester"><br>
        <input type="text" name="tahun" placeholder="Tahun"><br>

        <!-- Pertanyaan dan pilihan jawaban -->
        <?php while ($row_pertanyaan = mysqli_fetch_assoc($result_pertanyaan)) { ?>
            <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $row_pertanyaan["nama_pertanyaan"]; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                $id_pertanyaan = $row_pertanyaan["id_pertanyaan"];
                $query_jawaban = "SELECT * FROM jawaban WHERE id_pertanyaan = '$id_pertanyaan'";
                $result_jawaban = mysqli_query($koneksi, $query_jawaban);
                while ($row_jawaban = mysqli_fetch_assoc($result_jawaban)) {
                    $id_jawaban = $row_jawaban["id_jawaban"];
                    $nama_jawaban = $row_jawaban["nama_jawaban"];
                    ?>
<div class="form-group">
                      <div class="radio" >
                        <label>
                          <input type="radio" name="jawaban[<?php echo $id_pertanyaan; ?>]" value="<?php echo $id_jawaban; ?>" id="optionsRadios1" >
                          <?php echo $nama_jawaban; ?>
                        </label>
                      </div>
                    </div>

 <?php } ?>
 </div><!-- /.box -->
        <?php } ?>
        <div class="box-header with-border">
                  <h3 class="box-title"><button class="btn btn-primary" type="submit">Submit</button></h3>
                </div><!-- /.box-header -->
    
        </div><!-- /.box -->
    </form>         
    </div></div></div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

<!-- ./wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://github.com/pottsed">Pottsed</a>.</strong> All rights
    reserved.
  </footer>

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
