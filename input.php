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
elseif($_GET['aksi']=='inputkelas'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_kelas])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=kelas')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into kelas (nama_kelas) 
	values ('$_POST[nama_kelas]')");  
	echo "<script>window.location=('proses.php?aksi=kelas')</script>";
}
elseif($_GET['aksi']=='inputjadwal1s'){
	// Memeriksa apakah input kosong
	if (isset($_POST['hari_jadwal'], $_POST['jam_mulai'], $_POST['jam_selesai'], $_POST['id_kelas'], $_POST['id_dosen'], $_POST['id_matakul'], $_POST['id_ruangan'], $_POST['id_semester'])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=jadwal')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into jadwal (hari_jadwal,jam_mulai,jam_selesai,id_kelas,id_dosen,id_matakul,id_ruangan,id_semester) 
	values ('$_POST[hari_jadwal]','$_POST[jam_mulai]','$_POST[jam_selesai]','$_POST[id_kelas]','$_POST[id_dosen]','$_POST[id_matakul]','$_POST[id_ruangan]','$_POST[id_semester]')");  
	echo "<script>window.location=('proses.php?aksi=jadwal')</script>";
}
elseif($_GET['aksi']=='inputjadwal2'){
	// Memeriksa apakah input kosong
	if (isset($_POST['hari_jadwal'], $_POST['jam_mulai'], $_POST['jam_selesai'], $_POST['id_kelas'], $_POST['id_dosen'], $_POST['id_matakul'], $_POST['id_ruangan'], $_POST['id_semester'])) {
		// Lanjutkan dengan cek duplikasi input
		$hari_jadwal = $_POST['hari_jadwal'];
		$jam_mulai = $_POST['jam_mulai'];
		$jam_selesai = $_POST['jam_selesai'];
		$id_kelas = $_POST['id_kelas'];
		$id_dosen = $_POST['id_dosen'];
		$id_matakul = $_POST['id_matakul'];
		$id_ruangan = $_POST['id_ruangan'];
		$id_semester = $_POST['id_semester'];
	
		// Periksa duplikasi input
		$query_check = "SELECT COUNT(*) AS total FROM jadwal WHERE hari_jadwal = '$hari_jadwal' AND jam_mulai = '$jam_mulai' AND jam_selesai = '$jam_selesai' AND id_kelas = '$id_kelas' AND id_dosen = '$id_dosen' AND id_matakul = '$id_matakul' AND id_ruangan = '$id_ruangan' AND id_semester = '$id_semester'";
		$result_check = mysqli_query($koneksi, $query_check);
		$row_check = mysqli_fetch_assoc($result_check);
		$total_duplicates = $row_check['total'];
	
		if ($total_duplicates > 0) {
			// Jika terdapat duplikasi input, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
			echo "<script>window.alert('jadwal yang Anda buat dupikasi atau ganda perikasa lagi');
			window.location=('proses.php?aksi=jadwal')</script>";
			exit();
		} else {
			// Jika tidak ada duplikasi, lanjutkan dengan query insert
			$query_insert = "INSERT INTO jadwal (hari_jadwal, jam_mulai, jam_selesai, id_kelas, id_dosen, id_matakul, id_ruangan, id_semester) VALUES ('$hari_jadwal', '$jam_mulai', '$jam_selesai', '$id_kelas', '$id_dosen', '$id_matakul', '$id_ruangan', '$id_semester')";
			mysqli_query($koneksi, $query_insert);
		}
		echo "<script>window.alert('data ok');
		window.location=('proses.php?aksi=jadwal')</script>";
	} else {
		// Jika input tidak lengkap, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('proses.php?aksi=jadwal')</script>";
		exit();
	}
}
elseif($_GET['aksi']=='inputjadwal'){
// Mendapatkan data input
$hari_jadwal = $_POST['hari_jadwal'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$id_kelas = $_POST['id_kelas'];
$id_dosen = $_POST['id_dosen'];
$id_matakul = $_POST['id_matakul'];
$id_ruangan = $_POST['id_ruangan'];
$id_semester = $_POST['id_semester'];

// Validasi jumlah dosen dalam ruangan pada waktu yang sama
$query_dosen_ruangan = "SELECT COUNT(*) AS jumlah_dosen_ruangan FROM jadwal WHERE id_ruangan = '$id_ruangan' AND hari_jadwal = '$hari_jadwal' AND jam_mulai <= '$jam_selesai' AND jam_selesai >= '$jam_mulai'";
$result_dosen_ruangan = mysqli_query($koneksi, $query_dosen_ruangan);
$row_dosen_ruangan = mysqli_fetch_assoc($result_dosen_ruangan);
$jumlah_dosen_ruangan = $row_dosen_ruangan['jumlah_dosen_ruangan'];

if ($jumlah_dosen_ruangan >= 1) {
    // Jika sudah terdapat dosen dalam ruangan pada waktu yang sama, tampilkan pesan error
    echo "<script>window.alert('Tidak dapat menambahkan jadwal. Sudah terdapat dosen yang mengajar dalam ruangan pada waktu yang sama');
	window.location=('proses.php?aksi=jadwal')</script>";
} else {
    // Validasi jumlah mata kuliah dalam ruangan
    $query_matakul_ruangan = "SELECT COUNT(*) AS jumlah_matakul_ruangan FROM jadwal WHERE id_ruangan = '$id_ruangan' AND id_matakul = '$id_matakul'";
    $result_matakul_ruangan = mysqli_query($koneksi, $query_matakul_ruangan);
    $row_matakul_ruangan = mysqli_fetch_assoc($result_matakul_ruangan);
    $jumlah_matakul_ruangan = $row_matakul_ruangan['jumlah_matakul_ruangan'];

    if ($jumlah_matakul_ruangan >= 1) {
        // Jika sudah terdapat mata kuliah dalam ruangan, tampilkan pesan error
		echo "<script>window.alert('Tidak dapat menambahkan jadwal. Sudah terdapat mata kuliah lain dalam ruangan yang sama.');
		window.location=('proses.php?aksi=jadwal')</script>";
    } else {
        // Validasi jumlah mata kuliah dalam waktu yang sama dan kelas yang sama
        $query_matakul_waktu_kelas = "SELECT COUNT(*) AS jumlah_matakul_waktu_kelas FROM jadwal WHERE hari_jadwal = '$hari_jadwal' AND jam_mulai <= '$jam_selesai' AND jam_selesai >= '$jam_mulai' AND id_kelas = '$id_kelas'";
        $result_matakul_waktu_kelas = mysqli_query($koneksi, $query_matakul_waktu_kelas);
        $row_matakul_waktu_kelas = mysqli_fetch_assoc($result_matakul_waktu_kelas);
        $jumlah_matakul_waktu_kelas = $row_matakul_waktu_kelas['jumlah_matakul_waktu_kelas'];

        if ($jumlah_matakul_waktu_kelas >= 1) {
            // Jika sudah terdapat mata kuliah dalam waktu dan kelas yang sama, tampilkan pesan error
			echo "<script>window.alert('Tidak dapat menambahkan jadwal. Sudah terdapat mata kuliah lain dalam waktu dan kelas yang sama');
			window.location=('proses.php?aksi=jadwal')</script>";
        } else {
            // Jika semua validasi berhasil, lakukan proses insert data
            $query_insert = "INSERT INTO jadwal (hari_jadwal, jam_mulai, jam_selesai, id_kelas, id_dosen, id_matakul, id_ruangan, id_semester) 
                             VALUES ('$hari_jadwal', '$jam_mulai', '$jam_selesai', '$id_kelas', '$id_dosen', '$id_matakul', '$id_ruangan', '$id_semester')";

            if (mysqli_query($koneksi, $query_insert)) {
                echo "<script>window.alert('Data jadwal berhasil disimpan.');
				window.location=('proses.php?aksi=jadwal')</script>";
            } else {
                echo "<script>window.alert('Gagal menyimpan data jadwal.');
				window.location=('proses.php?aksi=jadwal')</script>";
            }
        }
    }
}


}
?>