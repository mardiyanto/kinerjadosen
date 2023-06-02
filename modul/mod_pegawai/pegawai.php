<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_pegawai/aksi_pegawai.php";

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
		<h1>Manajemen Data Pegawai</h1>
		<ol class="breadcrumb">
            <li><a class="btn btn-warning btn-sm" href="<?php echo $base_url.$mod; ?>-tambah.html"><i class="fa fa-plus"></i>Tambah Pegawai</a></li>
        </ol>
	</section>
	<hr>
                <div class="box-body">
                  <table id="datatemplates" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
						<th>Nama Atasan</th>
						<th>Jabatan</th>
						<th>Detail Jabatan</th>
						<th>Bidang</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$query  = "SELECT a.nip,a.nama,c.nama_atasan as atasan,d.nama_jabatan as jabatan, a.detail_jabatan, b.nama_bidang as bidang, a.id
FROM pegawai a, bidang b, atasan c, jabatan d
WHERE a.bidang=b.id and a.atasan=c.id and a.jabatan=d.id order by a.bidang,a.atasan,a.jabatan";
					$tampil = mysqli_query($konek, $query);
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){  
						echo "<tr><td>$no</td>
							<td>$r[nip]</td>
                			<td>$r[nama]</td>
							<td>$r[atasan]</td>
							<td>$r[jabatan]</td>
							<td>$r[detail_jabatan]</td>
							<td>$r[bidang]</td>
                  		
                  		
                  		
                  			<td align=\"center\"><a href=\"".$base_url.$mod."-edit-$r[id].html\" title=\"Edit Data\"><i class=\"fa fa-pencil\"></i></a> &nbsp; 
                			<a href=\"$aksi?module=pegawai&act=hapus&id=$r[id]\" onclick=\"return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA INI ?')\" title=\"Hapus Data\"><i class=\"fa fa-trash text-red\"></i></a> &nbsp; 
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
                  <h3 class="box-title">Tambah Pegawai</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=pegawai&act=input" class="form-horizontal">
					<div class="box-body">
					<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nip" name="nip" />
							</div>
						</div>
							<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama" name="nama" />
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Nama Atasan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_atasan" name="nama_atasan">
									<option value="0" selected>- Pilih Atasan -</option>
									<?php
									$query  = "SELECT * FROM atasan ORDER BY nama_atasan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama_atasan]</option>";
									}
									?>
								</select>
							</div>
						</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Jabatan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_jabatan" name="nama_jabatan">
									<option value="0" selected>- Pilih Jabatan -</option>
									<?php
									$query  = "SELECT * FROM jabatan ORDER BY nama_jabatan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama_jabatan]</option>";
									}
									?>
								</select>
							</div>
						</div>
							<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Detail Jabatan</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan" />
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Bidang</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_bidang" name="nama_bidang">
									<option value="0" selected>- Pilih Bidang -</option>
									<?php
									$query  = "SELECT * FROM bidang ORDER BY nama_bidang";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama_bidang]</option>";
									}
									?>
								</select>
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
			$query = "SELECT * FROM pegawai WHERE id='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$res     = mysqli_fetch_array($hasil);
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Pegawai</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=pegawai&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
					<div class="box-body">
					
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $res['nip'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Nama </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $res['nama'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Nama Atasan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_atasan" name="nama_atasan">
									
									<?php
									$query  = "SELECT * FROM atasan ORDER BY nama_atasan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['atasan']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama_atasan]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama_atasan]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Jabatan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_jabatan" name="nama_jabatan">
									
									<?php
									$query  = "SELECT * FROM jabatan ORDER BY nama_jabatan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['jabatan']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama_jabatan]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama_jabatan]</option>";
									}
									?>
								</select>
							</div>
						</div>
							<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Detail Jabatan </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan" value="<?php echo $res['detail_jabatan'];?>"/>
							</div>
						</div>
						<div class="box-body">
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Bidang</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_bidang" name="nama_bidang">
									
									<?php
									$query  = "SELECT * FROM bidang ORDER BY nama_bidang";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['nama_bidang']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama_bidang]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama_bidang]</option>";
									}
									?>
								</select>
							</div>
						</div>
					</div><!-- /.box-body -->
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