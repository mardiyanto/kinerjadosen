<?php
// Menghubungkan ke database
include 'config/connection.php';

// Proses login
if (isset($_POST['login'])) {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Login berhasil
            session_start();
            $_SESSION['id_mahasiswa'] = $row['id_mahasiswa'];
            $_SESSION['nama_mahasiswa'] = $row['nama_mahasiswa'];
            $_SESSION['nim'] = $row['nim'];
            $_SESSION['email_mahasiswa'] = $row['email_mahasiswa'];

            // Redirect ke halaman setelah login berhasil
            echo "<script>alert('login berhasil');window.location.href='index.php?aksi=home'</script>"; 
            exit();
        } else {
            // Password salah
            echo "<script>alert('Password salah');window.location.href='login-msiswa.php'</script>";  
        }
    } else {
        // Pengguna tidak ditemukan
        echo "<script>alert('Pengguna tidak ditemukan');window.location.href='login-msiswa.php'</script>"; 
    }
}

// Proses reset password
if (isset($_POST['reset_password'])) {
    $nim = $_POST['nim'];
    $new_password = $_POST['new_password'];

    $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

    $query = "UPDATE mahasiswa SET password = '$hashedPassword' WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Reset password berhasil. Silakan login dengan password baru');window.location.href='login-msiswa.php'</script>";  
    } else {
        echo "<script>alert('Reset password gagal. Silakan coba lagi.');window.location.href='login-msiswa.php'</script>";
    }
}

// Proses registrasi
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah pengguna sudah terdaftar
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Pengguna dengan NIM tersebut sudah terdaftar');window.location.href='login-msiswa.php'</script>";
    } else {
        // Daftarkan pengguna baru
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO mahasiswa (nama_mahasiswa, nim, email_mahasiswa, password) VALUES ('$nama', '$nim', '$email', '$hashedPassword')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Registrasi berhasil. Silakan login.');window.location.href='login-msiswa.php'</script>";
        } else {
            echo "<script>alert(' Registrasi gagal. Silakan coba lagi.');window.location.href='login-msiswa.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="tema/css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
    <div class="container">
       <!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            <span class="text-primary">E-KINERJA DOSEN</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
           Aplikasi ini untuk penilaian mahasiswa terhadap dosen di kelas per satu semester berjalan
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form method="POST" action="">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" class="form-control" id="nama" name="nama" required>
                      <label class="form-label" for="form3Example1">Nama</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" class="form-control" id="nim_register" name="nim" required>
                      <label class="form-label" for="form3Example2">NPM</label>
                    </div>
                  </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                <input type="email" class="form-control" id="email" name="email" required>
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <input type="password" class="form-control" id="password_register" name="password" required>
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

            
                <button type="submit" class="btn btn-primary" name="register">Daftar</button>

  <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    login
  </button>
<!-- Button untuk membuka modal reset password -->
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#resetPasswordModal">
            Reset Password
        </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal login-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">LOGIN UNTUK QUISIONER</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  
            <form method="POST" action="">
                            <div class="form-group">
                                <label for="nim">NIM:</label>
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div><br>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div><br>

                            <button type="submit" class="btn btn-primary" name="login">Login</button><br>
                        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

 <!-- Modal reset password -->
  <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="resetPasswordModalLabel">RESET PASSWORD JIKA LUPA</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  
        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nim_reset">NIM:</label>
                                <input type="text" class="form-control" id="nim_reset" name="nim" required>
                            </div><br>

                            <div class="form-group">
                                <label for="new_password">Password Baru:</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div><br>

                            <button type="submit" class="btn btn-primary" name="reset_password">Reset Password</button>
                        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 

  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->  
    </div>
    <!-- End your project here-->

<!-- Section: Projects modals -->
    <!-- MDB -->
    <script type="text/javascript" src="tema/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>



        
      