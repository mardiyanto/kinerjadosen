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
  if ($module=='user' AND $act=='hapus'){
    $hapus = "DELETE FROM users WHERE id='$_GET[id]'";
    mysqli_query($konek, $hapus);
    
    header("location:".$base_url.$module);
  }

  // Input templates
  if ($module=='user' AND $act=='input'){
    $username		= $_POST['nip'];
	$password		= md5($_POST['password']);
	$no_telp		= $_POST['no_telp'];
	$email			= $_POST['email'];

    $input = "INSERT INTO users (username, password, email, no_telp) VALUES('$username','$password','$email','$no_telp')";
    mysqli_query($konek, $input);
    
     header("location:".$base_url.$module);
  }
  // Update templates
  elseif ($module=='user' AND $act=='update'){
    $id             = $_POST['id'];
    
	$password		= md5($_POST['password']);
	$no_telp		= $_POST['no_telp'];
	$email			= $_POST['email'];
	
	
	if($password==""){
		 $update = "UPDATE users SET  email='$email', no_telp='$no_telp' WHERE id='$id'";
	}
	else{
		 $update = "UPDATE users SET  password='$password', email='$email', no_telp='$no_telp' WHERE id='$id'";
	}

   
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
