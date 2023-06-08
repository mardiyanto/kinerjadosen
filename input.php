<?php
include 'config/connection.php';
  date_default_timezone_set('Asia/Jakarta');
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='inputdosen'){
// Memeriksa apakah input kosong
if (empty($_POST[nama_dosen]) || empty($_POST[nidn]) || empty($_POST[status_dos])) {
	echo "<script>window.alert('Data yang Anda isikan belum lengkap');
	window.location=('proses.php?aksi=dosen')</script>";
	exit();
}	
mysqli_query($koneksi,"insert into dosen (nama_dosen,nidn,status_dos) 
values ('$_POST[nama_dosen]','$_POST[nidn]','$_POST[status_dos]')");  
echo "<script>window.location=('proses.php?aksi=dosen')</script>";
}
elseif($_GET['aksi']=='inputjurusan'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_jur])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=jurusan')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into jurusan (nama_jur) 
	values ('$_POST[nama_jur]')");  
	echo "<script>window.location=('proses.php?aksi=jurusan')</script>";
}
elseif($_GET['aksi']=='inputmatakul'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_matakul])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=matakul')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into matakul (nama_matakul) 
	values ('$_POST[nama_matakul]')");  
	echo "<script>window.location=('proses.php?aksi=matakul')</script>";
}
elseif($_GET['aksi']=='inputsemester'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_semester]) || empty($_POST[tahun_semester])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=semester')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into semester (nama_semester,tahun_semester) 
	values ('$_POST[nama_semester]','$_POST[tahun_semester]')");  
	echo "<script>window.location=('proses.php?aksi=semester')</script>";
}
elseif($_GET['aksi']=='inputmahasiswa'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_mahasiswa]) || empty($_POST[nim])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=mahasiswa')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into mahasiswa (nama_mahasiswa,nim,email_mahasiswa) 
	values ('$_POST[nama_mahasiswa]','$_POST[nim]','$_POST[email_mahasiswa]')");  
	echo "<script>window.location=('proses.php?aksi=mahasiswa')</script>";
}
elseif($_GET['aksi']=='inputpertanyaan'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_pertanyaan]) || empty($_POST[status_pertanyaan])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=pertanyaan')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into pertanyaan (nama_pertanyaan,status_pertanyaan) 
	values ('$_POST[nama_pertanyaan]','$_POST[status_pertanyaan]')");  
	echo "<script>window.location=('proses.php?aksi=pertanyaan')</script>";
}
elseif($_GET['aksi']=='inputjawaban'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_jawaban]) || empty($_POST[id_pertanyaan])|| empty($_POST[nilai_jawaban])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=jawaban')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into jawaban (nama_jawaban,id_pertanyaan,nilai_jawaban) 
	values ('$_POST[nama_jawaban]','$_POST[id_pertanyaan]','$_POST[nilai_jawaban]')");  
	echo "<script>window.location=('proses.php?aksi=jawaban')</script>";
}
?>