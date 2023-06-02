<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_user/aksi_user.php";

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
		<h1>Manajemen User</h1>
		<ol class="breadcrumb">
            <li><a class="btn btn-warning btn-sm" href="<?php echo $base_url.$mod; ?>-tambah.html"><i class="fa fa-plus"></i>Tambah User</a></li>
        </ol>
	</section>
	<hr>
                <div class="box-body">
                  <table id="datatemplates" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                       <th>No</th>
                        <th>Username</th>
						<th>Password</th>
                        <th>Nama Lengkap</th>
						<th>Nomor Telepon</th>
						<th>Email</th>
						<th>Level</th>
						<th>Bidang</th>
						<th>Blokir</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$query  = "SELECT a.username,b.nama,a.password,c.nama_jabatan,b.detail_jabatan,d.nama_bidang,a.blokir,a.id,a.email,a.no_telp
FROM users a, pegawai b, jabatan c,bidang d
WHERE a.username=b.nip AND b.jabatan=c.id AND b.bidang=d.id
ORDER BY a.username";
					$tampil = mysqli_query($konek, $query);
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){  
						echo  "<tr><td>$no</td>
							<td>$r[username]</td>
                			<td>$r[password]</td>
							<td>$r[nama] </td>
							<td>$r[no_telp] </td>
							<td>$r[email] </td>
							<td>$r[nama_jabatan]  &nbsp; $r[detail_jabatan]</td>
							<td>$r[nama_bidang]</td>
							<td>$r[blokir]</td>
					
                			
                  		
                  			<td align=\"center\"><a href=\"".$base_url.$mod."-edit-$r[id].html\" title=\"Edit Data\"><i class=\"fa fa-pencil\"></i></a> &nbsp; 
                			<a href=\"$aksi?module=user&act=hapus&id=$r[id]\" onclick=\"return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA INI ?')\" title=\"Hapus Data\"><i class=\"fa fa-trash text-red\"></i></a> &nbsp; 
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
                  <h3 class="box-title">Tambah User</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=user&act=input" class="form-horizontal" onsubmit="return validasi_input(this)">
					<div class="box-body">
					
						<div class="form-group">
							<label for="album" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nip" name="nip">
									<option value="0" selected>- Pilih NIP -</option>
									<?php
									$query  = "SELECT * FROM pegawai";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[nip]\">$r[nip] - $r[nama]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="password" name="password" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email" name="email" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">No. Telepon</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="no_telp" name="no_telp" />
							</div>
						</div>
					
				
						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button> <button type="button" onclick="self.history.back()" class="btn">Batal</button>
					</div><!-- /.box-footer -->
				</form>
				</div>
              </div><!-- /.box -->
<?php
		break;
		
case "edit":
			$query = "SELECT * FROM users WHERE id='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$res     = mysqli_fetch_array($hasil);
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit User</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=user&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
					<div class="box-body">
					
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nip" name="nip" disabled>
									
									<?php
									$query  = "SELECT * FROM pegawai ORDER BY nip";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['username']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nip]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nip]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Password </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="password" name="password" />
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $res['email']; ?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">No. Telepon</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $res['no_telp']; ?>"/>
							</div>
						</div>
						
						
						
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