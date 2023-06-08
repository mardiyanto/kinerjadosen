<?php 
  
  $id = $_GET['id'];
  $sql = "SELECT * from karyawan where NIP='$id'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);


	if (isset($_POST['simpan'])) {
		$sql = "UPDATE karyawan SET  NIP='$_POST[NIP]', nama_karyawan='$_POST[karyawan]', JK='$_POST[JK]', Jabatan='$_POST[jabatan]' WHERE NIP='$id'";
		$query = mysqli_query($con, $sql);
  
		if ($query) {
			echo "<script>alert('Data berhasil diubah!');window.location.href='index.php?p=karyawan&ta=$ta'</script>";
		} else {
			echo "Error : " . mysqli_error($con);
		}
	}

 ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form karyawan</h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">NIP/NIDN</label>
              <input type="text" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan NIP" name="NIP" value="<?php echo $data['NIP']; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama karyawan</label>
              <input type="text" class="form-control input-lg" id="exampleInputEmail1" placeholder="Masukan Nama karyawan" name="karyawan" value="<?php echo $data['nama_karyawan']; ?>"required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jenis Kelamin</label>
              <select class="form-control custom-select input-lg" name="JK">
                <option disabled selected>-- Masukan Gender --</option>
                <option value="Pria" <?php if($data['JK']=="Pria"){echo"selected";}else{echo "";} ?>>Pria</option>
                <option value="Wanita" <?php if($data['JK']=="Wanita"){echo"selected";}else{echo "";} ?>>Wanita</option>
              </select>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Jabatan</label>
               <select class="form-control input-lg" name="jabatan" required>
                <option value='<?=$data[jabatan]?>' selected>tidak ganti</option>
                <?php $jabat=mysqli_query($con,"SELECT * from jabatan order by id");
                while ($jab=mysqli_fetch_array($jabat)) {
                  echo"<option value='$jab[id]'>$jab[nama_jabatan]</option>";

                }
                ?>
               </select>
            </div>
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
    
  </div>
  <!-- /.row -->