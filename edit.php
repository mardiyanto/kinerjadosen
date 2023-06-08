<?php
  include 'config/connection.php';
  date_default_timezone_set('Asia/Jakarta');

///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='proseseditdosen'){
echo "<script>window.alert('Data Berhasil di edit dan disimpan');
window.location=('proses.php?aksi=dosen')</script>";
///////////////////////////////////////////////////////////////////////////////////////////////////
}
elseif($_GET['aksi']=='proseseditjurusan'){
	mysqli_query($koneksi,"UPDATE jurusan SET nama_jur='$_POST[nama_jur]' WHERE id_jur='$_GET[id_jur]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('proses.php?aksi=jurusan')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='proseseditmatakul'){
	mysqli_query($koneksi,"UPDATE matakul SET nama_matakul='$_POST[nama_matakul]' WHERE id_matakul='$_GET[id_matakul]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('proses.php?aksi=matakul')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='proseseditsemester'){
	mysqli_query($koneksi,"UPDATE semester SET nama_semester='$_POST[nama_semester]',tahun_semester='$_POST[tahun_semester]' WHERE id_semester='$_GET[id_semester]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('proses.php?aksi=semester')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='proseseditmahasiswa'){
	mysqli_query($koneksi,"UPDATE mahasiswa SET nama_mahasiswa='$_POST[nama_mahasiswa]',nim='$_POST[nim]',email_mahasiswa='$_POST[email_mahasiswa]' WHERE id_mahasiswa='$_GET[id_mahasiswa]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('proses.php?aksi=mahasiswa')</script>";
}
elseif($_GET['aksi']=='proseseditpertanyaan'){
	mysqli_query($koneksi,"UPDATE pertanyaan SET nama_pertanyaan='$_POST[nama_pertanyaan]', status_pertanyaan='$_POST[status_pertanyaan]' WHERE id_pertanyaan='$_GET[id_pertanyaan]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('proses.php?aksi=pertanyaan')</script>";
}
elseif($_GET['aksi']=='proseseditjawaban'){
	mysqli_query($koneksi,"UPDATE jawaban SET nama_jawaban='$_POST[nama_jawaban]', id_pertanyaan='$_POST[id_pertanyaan]', nilai_jawaban='$_POST[nilai_jawaban]' WHERE id_jawaban='$_GET[id_jawaban]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('proses.php?aksi=jawaban')</script>";
}
?>