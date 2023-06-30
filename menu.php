<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= (@$_GET['p']=='')?'active':'' ?>">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <?php if (@$_SESSION['logged'] == 1): ?>
          <li class="treeview <?= (@$_GET['p']=='user')?'active':'' ?>">
            <a href="#">
              <i class="fa fa-user"></i> <span>User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin.php?p=user&act=create"><i class="fa fa-circle-o"></i> Buat User </a></li>
              <li><a href="admin.php?p=user"><i class="fa fa-circle-o"></i> Data User</a></li>
            </ul>
          </li>
          <li class="treeview <?= (@$_GET['p']=='karyawan')?'active':'' ?>">
            <a href="#">
              <i class="fa fa-user-secret"></i> <span>dosen</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin.php?p=karyawan&act=create"><i class="fa fa-circle-o"></i> Tambah data dosen </a></li>
              <li><a href="admin.php?p=karyawan"><i class="fa fa-circle-o"></i> Data dosen</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-secret"></i> <span>Akademik</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="proses.php?aksi=dosen"><i class="fa fa-circle-o"></i> Data dosen</a></li>
              <li><a href="proses.php?aksi=matakul"><i class="fa fa-circle-o"></i> Data matakuliah</a></li>
              <li><a href="proses.php?aksi=jurusan"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
              <li><a href="proses.php?aksi=semester"><i class="fa fa-circle-o"></i> Data Semester</a></li>
              <li><a href="proses.php?aksi=mahasiswa"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
              <li><a href="proses.php?aksi=kelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
              <li><a href="proses.php?aksi=ruangan"><i class="fa fa-circle-o"></i> Data ruangan</a></li>
              <li><a href="proses.php?aksi=jadwal"><i class="fa fa-circle-o"></i> Data jadwal dosen</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-secret"></i> <span>Quisioner Dosen</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="proses.php?aksi=pertanyaan"><i class="fa fa-circle-o"></i> Pertanyaan</a></li>
              <li><a href="proses.php?aksi=jawaban"><i class="fa fa-circle-o"></i> jawaban</a></li>
              <li><a href="proses.php?aksi=penilaian"><i class="fa fa-circle-o"></i> Penilaian</a></li>
            </ul>
          </li>
          <li class="treeview <?= (@$_GET['p']=='jabatan')?'active':'' ?>">
            <a href="#">
              <i class="fa fa-briefcase"></i> <span>Jabatan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin.php?p=jabatan&act=create"><i class="fa fa-circle-o"></i> Tambah data Jabatan </a></li>
              <li><a href="admin.php?p=jabatan"><i class="fa fa-circle-o"></i> Data Jabatan</a></li>
            </ul>
          </li>
          <li class="treeview <?= (@$_GET['p']=='periode')?'active':'' ?>">
            <a href="#">
              <i class="fa fa-clock-o"></i> <span>Periode Penilaian</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin.php?p=periode&act=create"><i class="fa fa-circle-o"></i> Tambah data periode </a></li>
              <li><a href="admin.php?p=periode"><i class="fa fa-circle-o"></i> Data periode</a></li>
            </ul>
          </li>
          <li class="treeview <?= (@$_GET['p']=='criteria')?'active':'' ?>">
            <a href="#">
              <i class="fa fa-list"></i> <span>Kriteria</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin.php?p=criteria&act=create"><i class="fa fa-circle-o"></i> Buat Kriteria </a></li>
              <li><a href="admin.php?p=criteria"><i class="fa fa-circle-o"></i> Data Kriteria</a></li>
            </ul>
          </li>
          <li class="<?= (@$_GET['p']=='bobot')?'active':'' ?>">
            <a href="admin.php?p=bobot">
              <i class="fa fa-th"></i> <span>Bobot kriteria</span>
            </a>
          </li>
          <!-- <li class="<?= (@$_GET['p']=='tsukamoto')?'active':'' ?>">
            <a href="?p=fuzzy">
              <i class="fa fa-calculator"></i> <span>Hitung Fuzzy</span>
            </a>
          </li> -->
          <li class="<?= (@$_GET['p']=='rank')?'active':'' ?>">
            <a href="admin.php?p=rank">
              <i class="fa fa-trophy"></i> <span>Ranking</span>
            </a>
          </li>
          <!-- <li class="<?= (@$_GET['p']=='report')?'active':'' ?>">
            <a href="?p=report">
              <i class="fa fa-file"></i> <span>Laporan</span>
            </a>
          </li> -->
        <?php endif; ?>

        <?php if (@$_SESSION['logged'] == 2): ?>
          <!-- <li class="<?= (@$_GET['p']=='tsukamoto')?'active':'' ?>">
            <a href="?p=fuzzy">
              <i class="fa fa-calculator"></i> <span>Hitung Fuzzy</span>
            </a>
          </li> -->
          <li class="<?= (@$_GET['p']=='alternatif')?'active':'' ?>">
            <a href="admin.php?p=alternatif">
              <i class="fa fa-list"></i> <span>Alternatif</span>
            </a>
          </li>
          <li class="<?= (@$_GET['p']=='rank')?'active':'' ?>">
            <a href="admin.php?p=rank">
              <i class="fa fa-trophy"></i> <span>Ranking</span>
            </a>
          </li>
        <?php endif; ?>
        
        <?php if (@$_SESSION['logged'] == true): ?>
          <li class="header">OTHER</li>
          <li><a href="admin.php?logout"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        <?php endif; ?>
      </ul>