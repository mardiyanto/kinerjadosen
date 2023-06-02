<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = 'index.php'</script>"; 
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
	$module=$_GET['module'];
?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="<?php if($module=="beranda") echo "active"; ?>"><a href="<?php echo $base_url;?>beranda" title="beranda"><i class="fa fa-dashboard"></i> <span>Beranda 
	(<?php echo $_SESSION['leveluser'];?>)
            </span></a></li>
					<?php
					if (($_SESSION['leveluser']=='admin') ){
					
					?>

           <li class="treeview <?php if($module=="pegawai" || $module=="bidang" || $module=="jabatan" || $module=="atasan" || $module=="user" || $module=="kinerja" || $module=="kegiatan") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span><b>Manajemen Data</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($module=="pegawai") echo "active"; ?>"><a href="<?php echo $base_url;?>pegawai"><i class="fa fa-circle-o"></i> <span>Pegawai</span></a></li>		
					<li class="<?php if($module=="bidang") echo "active"; ?>"><a href="<?php echo $base_url;?>bidang"><i class="fa fa-circle-o"></i> <span>Bidang</span></a></li>
					<li class="<?php if($module=="jabatan") echo "active"; ?>"><a href="<?php echo $base_url;?>jabatan"><i class="fa fa-circle-o"></i> <span>Jabatan</span></a></li>
					<li class="<?php if($module=="atasan") echo "active"; ?>"><a href="<?php echo $base_url;?>atasan"><i class="fa fa-circle-o"></i> <span>Atasan</span></a></li>
					<li class="<?php if($module=="kegiatan") echo "active"; ?>"><a href="<?php echo $base_url;?>kegiatan"><i class="fa fa-circle-o"></i> <span>Kegiatan</span></a></li>
					<li class="<?php if($module=="user") echo "active"; ?>"><a href="<?php echo $base_url;?>user"><i class="fa fa-circle-o"></i> <span>Manajemen User</span></a></li>
					
				</ul>
			</li>	

		<?php	
					}
					?>
					
					<?php
					if (($_SESSION['leveluser']=='admin') || ($_SESSION['leveluser']=='staf') || ($_SESSION['leveluser']=='kasi') || ($_SESSION['leveluser']=='kasubag') || ($_SESSION['leveluser']=='kadis')){
					
					?>

				  <li class="treeview <?php if($module=="kegiatan" || $module=="kinerja") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span><b>Manajemen Kerja</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					
					<li class="<?php if($module=="kinerja") echo "active"; ?>"><a href="<?php echo $base_url;?>kinerja"><i class="fa fa-circle-o"></i> <span>Kinerja</span></a></li>
					</ul>
			</li>	

					<?php	
					}
					?>
          

			<li class="treeview <?php if($module=="laporanharian" || $module=="laporanbulanan" || $modul=="pegawai" || $modul=="bidang" || $modul=="jabatan" || $modul=="atasan" || $modul=="kegiatan" || $modul=="user" || $modul=="kinerja") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-cloud-download"></i>
					<span><b>Laporan</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($module=="laporanbulanan") echo "active"; ?>"><a href="<?php echo $base_url;?>laporanbulanan" title="Laporan Kinerja Bulanan"><i class="fa fa-circle-o"></i> <span>Laporan Kinerja Bulanan</span></a></li>					
					<li class="<?php if($module=="laporanharian") echo "active"; ?>"><a href="<?php echo $base_url;?>laporanharian" title="Laporan Kinerja Harian"><i class="fa fa-circle-o"></i> <span>Laporan Kinerja Harian</span></a></li>
<li class="<?php if($module=="approval") echo "active"; ?>"><a href="<?php echo $base_url;?>approval"><i class="fa fa-circle-o"></i> <span>Approval</span></a></li>					
				</ul>
			</li>
		   <!--
		   <li class="treeview <?php if($module=="berita" || $module=="kategori" || $module=="tag") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-edit"></i>
					<span><b>Manajemen Berita</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($module=="berita") echo "active"; ?>"><a href="?module=berita"><i class="fa fa-circle-o"></i> <span>Berita</span></a></li>
					<li class="<?php if($module=="kategori") echo "active"; ?>"><a href="?module=kategori"><i class="fa fa-circle-o"></i> <span>Kategori</span></a></li>
					<li class="<?php if($module=="tag") echo "active"; ?>"><a href="?module=tag"><i class="fa fa-circle-o"></i> <span>Tag / Label</span></a></li>
				</ul>
			</li>
			<li class="<?php if($module=="halamanstatis") echo "active"; ?>"><a href="?module=halamanstatis" title="Halaman Statis"><i class="fa fa-tag"></i> <span>Halaman Statis</span></a></li>
            <li class="treeview <?php if($module=="album" || $module=="galerifoto" || $module=="video" || $module=="download") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-edit"></i>
					<span><b>Media</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($module=="album") echo "active"; ?>"><a href="?module=album"><i class="fa fa-circle-o"></i> <span>Album</span></a></li>
					<li class="<?php if($module=="galerifoto") echo "active"; ?>"><a href="?module=galerifoto"><i class="fa fa-circle-o"></i> <span>Galeri Foto</span></a></li>
					<li class="<?php if($module=="video") echo "active"; ?>"><a href="?module=video"><i class="fa fa-circle-o"></i> <span>Video</span></a></li>
					<li class="<?php if($module=="download") echo "active"; ?>"><a href="?module=download"><i class="fa fa-circle-o"></i> <span>Download</span></a></li>
				</ul>
			</li>
            <li class="treeview <?php if($module=="agenda" || $module=="polling" || $module=="hubungi") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-edit"></i>
					<span><b>Interaksi</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($module=="agenda") echo "active"; ?>"><a href="?module=agenda"><i class="fa fa-circle-o"></i> <span>Agenda</span></a></li>
					<li class="<?php if($module=="polling") echo "active"; ?>"><a href="?module=polling"><i class="fa fa-circle-o"></i> <span>Polling</span></a></li>
					<li class="<?php if($module=="hubungi") echo "active"; ?>"><a href="?module=hubungi"><i class="fa fa-circle-o"></i> <span>Hubungi Kami</span></a></li>
				</ul>
			</li>
			<li class="<?php if($module=="banner") echo "active"; ?>"><a href="?module=banner" title="Banner"><i class="fa fa-tag"></i> <span>Banner</span></a></li>
			
			-->
			<li><a href="logout.php" title="Keluar"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php
}
?>