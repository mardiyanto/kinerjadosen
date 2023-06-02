<?php
session_start();

// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
  include "../../config/config.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus templates
  if ($module=='kinerja' AND $act=='hapus'){
    $hapus = "DELETE FROM kinerja WHERE id='$_GET[id]'";
    mysqli_query($konek, $hapus);
    
    header("location:".$base_url.$module);
  }
  
 
// Input templates
  if ($module=='kinerja' AND $act=='input'){
    $nama_pegawai		= $_POST['nama'];
	$uraian_kegiatan	= $_POST['uraian'];
  $datetime       =$_POST['waktu'];
  $datetime_selesai = $_POST['waktu_selesai'];



//echo $datetime;
    $input = "INSERT INTO kinerja(nama_pegawai, uraian_kegiatan, waktu, waktu_selesai) VALUES('$nama_pegawai', '$uraian_kegiatan','$datetime','$datetime_selesai')";
    mysqli_query($konek, $input);
    
//    echo $base_url.$module;    

    header("location:".$base_url.$module);
  }

  // Update templates
  elseif ($module=='kinerja' AND $act=='update'){
    $id            			 = $_POST['id'];
    $nama_pegawai			= $_POST['nama'];
    $uraian_kegiatan        = $_POST['uraian'];
	$waktu        			= $_POST['waktu'];
	$waktu_selesai        	= $_POST['waktu_selesai'];

	
    
    $update = "UPDATE kinerja SET nama_pegawai='$nama_pegawai', uraian_kegiatan='$uraian_kegiatan', waktu='$waktu', waktu_selesai='$waktu_selesai' WHERE id='$id'";
    mysqli_query($konek, $update);

    header("location:".$base_url.$module);
  }
  
   // Approv templates

 
   

  // Aktifkan templates
  elseif ($module=='templates' AND $act=='aktifkan'){
    $query1 = mysqli_query($konek, "UPDATE templates SET aktif='Y' WHERE id_templates='$_GET[id]'");
    $query2 = mysqli_query($konek, "UPDATE templates SET aktif='N' WHERE id_templates!='$_GET[id]'");

    header("location:../../media.php?module=".$module);
  }
}
?>
