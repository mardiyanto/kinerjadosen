<?php
if($_GET['aksi']=='home'){
    echo"
    <div class='row'>
    <div class='col-lg-12'>
       <div class='panel panel-default'>
           <div class='panel-heading'>
           </div>
           <div class='panel-body'>
           <div class='container mt-5'>
           <h1>Selamat datang,  $nama_mahasiswa</h1>
           <p>NIM: $nim</p>
           <p>Email:  $email_mahasiswa</p>
   
           <!-- Tombol untuk logout -->
           <a href='quis.php' class='btn btn-primary'>ISI QUISIONER DOSEN</a>
           <a href='logout-mhs.php' class='btn btn btn-danger'>Logout</a>
       </div>
           </div> 
        </div>
     </div>
    </div>
    ";
}

elseif($_GET['aksi']=='test'){ 
}
?>