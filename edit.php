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
elseif($_GET['aksi']=='proseseditkelas'){
	mysqli_query($koneksi,"UPDATE kelas SET nama_kelas='$_POST[nama_kelas]' WHERE id_kelas='$_GET[id_kelas]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('proses.php?aksi=kelas')</script>";
}
elseif($_GET['aksi']=='proseseditjadwal'){
	$hari_jadwal = $_POST['hari_jadwal'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $id_kelas = $_POST['id_kelas'];
    $id_dosen = $_POST['id_dosen'];
    $id_matakul = $_POST['id_matakul'];
    $id_ruangan = $_POST['id_ruangan'];
    $id_semester = $_POST['id_semester'];

    // Query update data jadwal
    $query_update = "UPDATE jadwal SET hari_jadwal = '$hari_jadwal', jam_mulai = '$jam_mulai', jam_selesai = '$jam_selesai', id_kelas = '$id_kelas', id_dosen = '$id_dosen', id_matakul = '$id_matakul', id_ruangan = '$id_ruangan', id_semester = '$id_semester' WHERE id_jadwal='$_GET[id_jadwal]'";
    $result_update = mysqli_query($koneksi, $query_update);

    if ($result_update) {
		echo "<script>window.alert('Data Berhasil di edit dan disimpan');
		window.location=('proses.php?aksi=jadwal')</script>";
    } else {
		echo "<script>window.alert('gagal');
		window.location=('proses.php?aksi=jadwal')</script>";
    }

}
?>