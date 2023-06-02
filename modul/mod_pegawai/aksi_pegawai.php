<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus templates
  if ($module=='pegawai' AND $act=='hapus'){
    $hapus = "DELETE FROM pegawai WHERE id='$_GET[id]'";
    mysqli_query($konek, $hapus);
    
    header("location:".$base_url.$module);
  }

  // Input templates
  if ($module=='pegawai' AND $act=='input'){
    $nip				= $_POST['nip'];
	$nama				= $_POST['nama'];
	$atasan				= $_POST['nama_atasan'];
	$jabatan			= $_POST['nama_jabatan'];
	$detail_jabatan		= $_POST['detail_jabatan'];
	$bidang				= $_POST['nama_bidang'];

    $input = "INSERT INTO pegawai(nip, nama, atasan, jabatan, detail_jabatan, bidang) VALUES('$nip', '$nama','$atasan','$jabatan','$detail_jabatan','$bidang')";
    mysqli_query($konek, $input);
    
     header("location:".$base_url.$module);
  }

  // Update templates
  elseif ($module=='pegawai' AND $act=='update'){
    $id             	= $_POST['id'];
    $nip				= $_POST['nip'];
    $nama        		= $_POST['nama'];
	$atasan        		= $_POST['nama_atasan'];
	$jabatan      		= $_POST['nama_jabatan'];
	$detail_jabatan		= $_POST['detail_jabatan'];
	$bidang       		= $_POST['nama_bidang'];
    
    $update = "UPDATE pegawai SET nip='$nip', nama='$nama', atasan='$atasan', jabatan='$jabatan', detail_jabatan='$detail_jabatan', bidang='$bidang' WHERE id='$id'";
    mysqli_query($konek, $update);

    header("location:".$base_url.$module);
  }

  // Aktifkan templates
  elseif ($module=='templates' AND $act=='aktifkan'){
    $query1 = mysqli_query($konek, "UPDATE templates SET aktif='Y' WHERE id_templates='$_GET[id]'");
    $query2 = mysqli_query($konek, "UPDATE templates SET aktif='N' WHERE id_templates!='$_GET[id]'");

    header("location:../../media.php?module=".$module);
  }
}
?>
