<?php
  include 'config/connection.php';
  date_default_timezone_set('Asia/Jakarta');
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='hapusdosen'){
mysqli_query($koneksi,"DELETE FROM dosen  WHERE id_dosen='$_GET[id_dosen]'");
echo "<script>window.location=('proses.php?aksi=dosen')</script>";
}

///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='hapusmenu'){
mysqli_query($koneksi,"DELETE FROM menu  WHERE id_menu='$_GET[id_menu]'");
echo "<script>window.location=('proses.php?aksi=menu')</script>";
}
elseif($_GET['aksi']=='hapusruangan'){
  mysqli_query($koneksi,"DELETE FROM ruang  WHERE id_ruang='$_GET[id_ruang]'");
  echo "<script>window.location=('proses.php?aksi=ruangan')</script>";
  }
elseif($_GET['aksi']=='hapusjurusan'){
  mysqli_query($koneksi,"DELETE FROM jurusan  WHERE id_jur='$_GET[id_jur]'");
  echo "<script>window.location=('proses.php?aksi=jurusan')</script>";
  }
elseif($_GET['aksi']=='hapusmatakul'){
mysqli_query($koneksi,"DELETE FROM matakul  WHERE id_matakul='$_GET[id_matakul]'");
echo "<script>window.location=('proses.php?aksi=matakul')</script>";
}
elseif($_GET['aksi']=='hapusmahasiswa'){
mysqli_query($koneksi,"DELETE FROM mahasiswa  WHERE id_mahasiswa='$_GET[id_mahasiswa]'");
echo "<script>window.location=('proses.php?aksi=mahasiswa')</script>";
}
elseif($_GET['aksi']=='hapusadmin'){
$data = mysqli_query($koneksi, "select * from user where user_id='$_GET[user_id]'");
$d = mysqli_fetch_assoc($data);
$foto = $d['user_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from user where user_id='$_GET[user_id]'");
echo "<script>window.location=('proses.php?aksi=admin')</script>";
}
elseif($_GET['aksi']=='hapusjadwal'){
  mysqli_query($koneksi,"DELETE FROM jadwal  WHERE id_jadwal='$_GET[id_jadwal]'");
  echo "<script>window.location=('proses.php?aksi=jadwal')</script>";
}

elseif($_GET['aksi']=='hapusjawaban'){
  mysqli_query($koneksi,"DELETE FROM jawaban  WHERE id_jawaban='$_GET[id_jawaban]'");
  echo "<script>window.location=('proses.php?aksi=jawaban')</script>";
}
elseif($_GET['aksi']=='hapustunpertanyaan'){
    mysqli_query($koneksi,"DELETE FROM pertanyaan  WHERE id_pertanyaan='$_GET[id_pertanyaan]'");
    echo "<script>window.location=('proses.php?aksi=pertanyaan')</script>";
} 
elseif($_GET['aksi']=='hapuskelas'){
      mysqli_query($koneksi,"DELETE FROM kelas  WHERE 	id_kelas='$_GET[id_kelas]'");
      echo "<script>window.location=('proses.php?aksi=kelas')</script>";
}    
elseif($_GET['aksi']=='hapussemester'){
  mysqli_query($koneksi,"DELETE FROM semester  WHERE 	id_semester='$_GET[id_semester]'");
  echo "<script>window.location=('proses.php?aksi=semester')</script>";
} 

?>