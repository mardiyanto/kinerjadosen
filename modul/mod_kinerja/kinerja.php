<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_kinerja/aksi_kinerja.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';  
  $mod=$_GET['module'];
?>
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
<?php
	switch($act){
		// Tampil Templates
		default:
?>
              
			  <div class="box">
			  <section class="content-header">
		<h1>Manajemen Kinerja</h1>
		<ol class="breadcrumb">
            <li><a class="btn btn-warning btn-sm" href="<?php echo $base_url.$mod; ?>-tambah.html"><i class="fa fa-plus"></i>Tambah Kinerja</a></li>
        </ol>
	</section>
	<hr>
                <div class="box-body">
                  <table id="datatemplates" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Uraian Kegiatan</th>
						<th>Waktu Mulai</th>
						<th>Waktu Selesai</th>
						<th>Aksi</th>
					
                      </tr>
                    </thead>
                    <tbody>
					<?php
					
					if($_SESSION['leveluser']=="admin"){
					$query  = "SELECT a.nama,b.uraian,c.waktu,c.waktu_selesai,c.id
FROM pegawai a, kegiatan b, kinerja c
WHERE c.nama_pegawai=a.id and c.uraian_kegiatan=b.id order by c.id";
					}else{
						$query  = "SELECT a.nama,b.uraian,c.waktu,c.waktu_selesai,c.id
FROM pegawai a, kegiatan b, kinerja c
WHERE c.nama_pegawai=a.id and c.uraian_kegiatan=b.id and a.nip='$_SESSION[username]' order by c.id";
					}




					$tampil = mysqli_query($konek, $query);
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){  
						echo "<tr><td>$no</td>
							<td>$r[nama]</td>
                			<td>$r[uraian]</td>
							<td>$r[waktu]</td>
							<td>$r[waktu_selesai]</td>
							
							
							
                  		
                  	
                  			<td align=\"center\"><a href=\"".$base_url.$mod."-edit-$r[id].html\" title=\"Edit Data\"><i class=\"fa fa-pencil\"></i></a> &nbsp; 
                			<a href=\"$aksi?module=kinerja&act=hapus&id=$r[id]\" onclick=\"return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA INI ?')\" title=\"Hapus Data\"><i class=\"fa fa-trash text-red\"></i></a> &nbsp; 
	                    	</td>
							</tr>";
						$no++;
					}
					?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


<?php
		break;
		
		case "tambah":
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Kinerja</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=kinerja&act=input" class="form-horizontal">
				
					<div class="box-body">
					
					        <?php
							if($_SESSION['level']=="admin"){
							?>
					
							<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Nama Pegawai</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama" name="nama">
									<option value="0" selected>- Pilih Pegawai -</option>
									<?php
									$query  = "SELECT * FROM pegawai";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<?php
							}
							else{
						?>
						<input type="text" name="nama" value="<?php echo $_SESSION['namauser'];?>" />
						<?php
							}
							?>
						
						
						
							<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Uraian Kegiatan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="uraian" name="uraian">
									<option value="0" selected>- Pilih Uraian Kegiatan -</option>
									<?php
									$query  = "SELECT * FROM kegiatan ORDER BY uraian";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[uraian]</option>";
									}
									?>
								</select>
							</div>
						</div>
						 
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Waktu Mulai</label>
						
							<div class="col-sm-6">
								<input type="datetime-local" class="form-control" id="tgl_selesaix" name="waktu" />
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Waktu Selesai</label>
						
							<div class="col-sm-6">
								<input type="datetime-local" class="form-control" id="tgl_selesaix" name="waktu_selesai" />
							</div>
						</div>
						
						
			
				
						
						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button> <button type="button" onclick="self.history.back()" class="btn">Batal</button>
					</div><!-- /.box-footer -->
				</form>
              </div><!-- /.box -->
<?php
		break;
		
	case "edit":
			$query = "SELECT * FROM kinerja WHERE id='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$res     = mysqli_fetch_array($hasil);
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Kinerja</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=kinerja&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
					<div class="box-body">
					
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Nama Pegawai</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama" name="nama">
									
									<?php
									$query  = "SELECT * FROM pegawai ORDER BY nama";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['nama_pegawai']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Uraian Kegiatan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="uraian" name="uraian">
									
									<?php
									$query  = "SELECT * FROM kegiatan ORDER BY uraian";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['uraian_kegiatan']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[uraian]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[uraian]</option>";
									}
									?>
								</select>
							</div>
						</div>
							<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Waktu Mulai </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="tgl_selesaix" name="waktu" value="<?php echo $res['waktu'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Waktu Selesai </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="tgl_selesaix" name="waktu_selesai" value="<?php echo $res['waktu_selesai'];?>"/>
							</div>
						</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Update</button> <button type="button" onclick="self.history.back()" class="btn">Batal</button>
					</div><!-- /.box-footer -->
				</form>
              </div><!-- /.box -->
<?php
		break;
	}
?>
            </div><!-- /.col -->
		</div>
	</section>
<?php
}
?>


