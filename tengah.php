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
 
           <a href='logout-mhs.php' class='btn btn btn-danger'>Logout</a>
       </div>
           </div> 
        </div>
     </div>
    </div>
    ";
    echo"  <div class='row'>
    <div class='col-lg-12'>";
$no=0;
$sql=mysqli_query($koneksi," SELECT * FROM jadwal,matakul,dosen,kelas,semester,ruangan WHERE jadwal.id_dosen=dosen.id_dosen 
and jadwal.id_matakul=matakul.id_matakul and jadwal.id_kelas=kelas.id_kelas and jadwal.id_semester=semester.id_semester 
and jadwal.id_ruangan=ruangan.id_ruangan and jadwal.id_kelas=$_SESSION[id_kelas] ORDER BY jadwal.id_jadwal DESC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
    echo"
    <div class='col-md-4'>
      <!-- Widget: user widget style 1 -->
      <div class='box box-widget widget-user-2'>
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class='widget-user-header bg-yellow'>
          <div class='widget-user-image'>
            <img class='img-circle' src='assets/img/user2-160x160.jpg' alt='User Avatar'>
          </div><!-- /.widget-user-image -->
          <h3 class='widget-user-username'>$t[nama_dosen]</h3>
          <h5 class='widget-user-desc'>Matakuliah : $t[nama_matakul]</h5>
        </div>
        <div class='box-footer no-padding'>
          <ul class='nav nav-stacked'>
            <li><a href='#'>Ruangan<span class='pull-right badge bg-blue'>$t[nama_ruangan]</span></a></li>
            <li><a href='#'>Hari & Jam <span class='pull-right badge bg-aqua'>$t[hari_jadwal] $t[jam_mulai]-$t[jam_selesai]</span></a></li>
            <li><a href='#'>Semester <span class='pull-right badge bg-red'>$t[nama_semester] $t[tahun_semester]</span></a></li>
            <li><a href='#'>Kelas <span class='pull-right badge bg-green'>$t[nama_kelas]</span></a></li>
          </ul>";
          if($t[status_quis]=='belum'){
            echo" <a href='quis.php?id_matakul=$t[id_matakul]&id_dosen=$t[id_dosen]&id_semester=$t[id_semester]&id_jadwal=$t[id_jadwal]' class='btn btn-primary btn-lg btn-block'>ISI KINERJA</a> ";
          } else {
            echo"<button type='button' class='btn btn-success btn-lg btn-block'>SUDAH ISI</button>";
          }
                echo" </div>
      </div><!-- /.widget-user -->
    </div><!-- /.col --> 
    ";
        }
    echo" </div>
    </div>";  
}

elseif($_GET['aksi']=='jadwal'){ 
   echo"  <div class='row'>
    <div class='col-lg-12'>";
$no=0;
$sql=mysqli_query($koneksi," SELECT * FROM jadwal,matakul,dosen,kelas,semester,ruangan WHERE jadwal.id_dosen=dosen.id_dosen 
and jadwal.id_matakul=matakul.id_matakul and jadwal.id_kelas=kelas.id_kelas and jadwal.id_semester=semester.id_semester 
and jadwal.id_ruangan=ruangan.id_ruangan and jadwal.id_kelas=$_SESSION[id_kelas] ORDER BY jadwal.id_jadwal DESC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
    echo"
    <div class='col-md-4'>
      <!-- Widget: user widget style 1 -->
      <div class='box box-widget widget-user-2'>
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class='widget-user-header bg-yellow'>
          <div class='widget-user-image'>
            <img class='img-circle' src='assets/img/user2-160x160.jpg' alt='User Avatar'>
          </div><!-- /.widget-user-image -->
          <h3 class='widget-user-username'>$t[nama_dosen]</h3>
          <h5 class='widget-user-desc'>Matakuliah : $t[nama_matakul]</h5>
        </div>
        <div class='box-footer no-padding'>
          <ul class='nav nav-stacked'>
            <li><a href='#'>Ruangan<span class='pull-right badge bg-blue'>$t[nama_ruangan]</span></a></li>
            <li><a href='#'>Hari & Jam <span class='pull-right badge bg-aqua'>$t[hari_jadwal] $t[jam_mulai]-$t[jam_selesai]</span></a></li>
            <li><a href='#'>Semester <span class='pull-right badge bg-red'>$t[nama_semester] $t[tahun_semester]</span></a></li>
            <li><a href='#'>Kelas <span class='pull-right badge bg-green'>$t[nama_kelas]</span></a></li>
          </ul>";
          if($t[status_quis]=='belum'){
            echo" <a href='quis.php?id_matakul=$t[id_matakul]&id_dosen=$t[id_dosen]&id_semester=$t[id_semester]&id_jadwal=$t[id_jadwal]' class='btn btn-primary btn-lg btn-block'>ISI KINERJA</a> ";
          } else {
            echo"<button type='button' class='btn btn-success btn-lg btn-block'>SUDAH ISI</button>";
          }
                echo" </div>
      </div><!-- /.widget-user -->
    </div><!-- /.col --> 
    ";
        }
    echo" </div>
    </div>";
}
?>