<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='dosen'){
echo"<div class='row'>
<div class='col-lg-12'>
    <div class='panel panel-default'>
        <div class='panel-heading'>INFORMASI 
        </div>
        <div class='panel-body'>	
<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                Tambah Data
            </button> </br>
               <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                    <thead>
                        <tr> 
                            <th>No</th>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>	 
                            <th>Status</th>	 
                             <th>AKSI</th>	
                        </tr>
                    </thead><tbody>
    ";

$no=0;
$sql=mysqli_query($koneksi," SELECT * FROM dosen ORDER BY id_dosen ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                    echo"
                        <tr><td>$no</td>
                            <td>$t[nidn]</td>
                            <td>$t[nama_dosen]</td> 
                            <td>$t[status_dos]</td> 
            <td><div class='btn-group'>
      <button type='button' class='btn btn-info'>AKSI</button>
      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
        <span class='caret'></span>
        <span class='sr-only'>Toggle Dropdown</span>
      </button>
      <ul class='dropdown-menu' role='menu'>
        <li><a href='proses.php?aksi=editdosen&id_dosen=$t[id_dosen]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
        <li><a href='hapus.php?aksi=hapusdosen&id_dosen=$t[id_dosen]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_dosen] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
        </ul>
    </div></td>
                        </tr>";
}
                echo"
                    </tbody></table>
            </div>
        </div>
    </div>
</div>
</div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h4 class='modal-title' id='H3'>Input Data</h4>
                        </div>
                        <div class='modal-body'>
                           <form role='form' method='post' action='input.php?aksi=inputdosen'>
                    
                            <label>NIND</label>
                            <input type='text' class='form-control' name='nidn'/><br>
                            <label>Nama Dosen</label>
                            <input type='text' class='form-control' name='nama_dosen'/><br>
                            <label>Pilih Status Dosen</label>
                            <select class='form-control select2' style='width: 100%;' name=status_dos>
                            <option value='' selected>Pilih Status</option>
                            <option value='tetap'>DOSEN TETAP</option>
                            <option value='pengajar'>TENAGA PENGAJAR</option>
                            </select><br><br>
                            
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div>
    </form>
                    </div>
                </div>
            </div>
    </div>
</div>			
"; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editdosen'){
$tebaru=mysqli_query($koneksi," SELECT * FROM dosen WHERE id_dosen=$_GET[id_dosen] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
<div class='col-lg-12'>
    <div class='panel panel-default'>
        <div class='panel-heading'>EDIT  $t[nama_dosen] $t[id_dosen]
        </div>
        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditdosen&id_dosen=$t[id_dosen]'>
<label>NIND</label>
<input type='text' class='form-control' value='$t[nidn]' name='nidn'/><br>
<label>Nama Dosen</label>
<input type='text' class='form-control' value='$t[nama_dosen]' name='nama_dosen'/><br>
<label>Pilih Status Dosen</label>
<select class='form-control select2' style='width: 100%;' name=status_dos>
<option value='$t[status_dos]' selected>$t[status_dos]</option>
<option value='tetap'>DOSEN TETAP</option>
<option value='pengajar'>TENAGA PENGAJAR</option>
</select><br><br>
              

<div class='modal-footer'>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div> </div>
</form></div> </div></div></div>
";
}

///////////////////////////lihat/////////////////////////////////////////////
elseif($_GET['aksi']=='jurusan'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                    Tambah Data
                </button> </br>
                   <div class='table-responsive'>		
    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Nama Jurusan</th>	 
                                 <th>AKSI</th>	
                            </tr>
                        </thead><tbody>
        ";
    
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM jurusan ORDER BY id_jur ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                        echo"
                            <tr><td>$no</td>
                                <td>$t[nama_jur]</td> 
                <td><div class='btn-group'>
          <button type='button' class='btn btn-info'>AKSI</button>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='proses.php?aksi=editjurusan&id_jur=$t[id_jur]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
            <li><a href='hapus.php?aksi=hapusjurusan&id_jur=$t[id_jur]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_jur] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div></td>
                            </tr>";
    }
                    echo"
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
    </div>";			
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                <h4 class='modal-title' id='H3'>Input Data</h4>
                            </div>
                            <div class='modal-body'>
                               <form role='form' method='post' action='input.php?aksi=inputjurusan'>
                    
                                <label>Nama Jurusan</label>
                                <input type='text' class='form-control' name='nama_jur'/><br>
                              
                                
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div>
        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>			
    "; 
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    
    elseif($_GET['aksi']=='editjurusan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM jurusan WHERE id_jur=$_GET[id_jur] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>EDIT  $t[nama_jur] $t[id_jur]
            </div>
            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditjurusan&id_jur=$t[id_jur]'>
    <label>Nama Jurusan</label>
    <input type='text' class='form-control' value='$t[nama_jur]' name='nama_jur'/><br>
                  
    
    <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div> </div>
    </form></div> </div></div></div>
    ";
    }
    
///////////////////////////lihat/////////////////////////////////////////////
elseif($_GET['aksi']=='matakul'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                    Tambah Data
                </button> </br>
                   <div class='table-responsive'>		
    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Nama Matakuliah</th>	 
                                 <th>AKSI</th>	
                            </tr>
                        </thead><tbody>
        ";
    
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM matakul ORDER BY id_matakul ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                        echo"
                            <tr><td>$no</td>
                                <td>$t[nama_matakul]</td> 
                <td><div class='btn-group'>
          <button type='button' class='btn btn-info'>AKSI</button>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='proses.php?aksi=editmatakul&id_matakul=$t[id_matakul]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
            <li><a href='hapus.php?aksi=hapusmatakul&id_matakul=$t[id_matakul]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_matakul] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div></td>
                            </tr>";
    }
                    echo"
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
    </div>";			
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                <h4 class='modal-title' id='H3'>Input Data</h4>
                            </div>
                            <div class='modal-body'>
                               <form role='form' method='post' action='input.php?aksi=inputmatakul'>
                                <label>Nama Matakuliah</label>
                                <input type='text' class='form-control' name='nama_matakul'/><br>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div>
        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>			
    "; 
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    
    elseif($_GET['aksi']=='editjurusan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM matakul WHERE id_matakul=$_GET[id_matakul] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>EDIT  $t[nama_matakul] $t[id_matakul]
            </div>
            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditmatakul&id_matakul=$t[id_matakul]'>
    <label>Nama Jurusan</label>
    <input type='text' class='form-control' value='$t[nama_matakul]' name='nama_matakul'/><br>
    <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div> </div>
    </form></div> </div></div></div>
    ";
    }


    elseif($_GET['aksi']=='semester'){
        echo"<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI 
                </div>
                <div class='panel-body'>	
        <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                        Tambah Data
                    </button> </br>
                       <div class='table-responsive'>		
        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr> 
                                    <th>No</th>
                                    <th>Nama Semester</th>	 
                                    <th>Tahun Semester</th>	 
                                     <th>AKSI</th>	
                                </tr>
                            </thead><tbody>
            ";
        
        $no=0;
        $sql=mysqli_query($koneksi," SELECT * FROM semester ORDER BY id_semester ASC");
        while ($t=mysqli_fetch_array($sql)){	
        $no++;
                            echo"
                                <tr><td>$no</td>
                                    <td>$t[nama_semester]</td> 
                                    <td>$t[tahun_semester]</td> 
                    <td><div class='btn-group'>
              <button type='button' class='btn btn-info'>AKSI</button>
              <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                <span class='caret'></span>
                <span class='sr-only'>Toggle Dropdown</span>
              </button>
              <ul class='dropdown-menu' role='menu'>
                <li><a href='proses.php?aksi=editsemester&id_semester=$t[id_semester]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                <li><a href='hapus.php?aksi=hapussemester&id_semester=$t[id_semester]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_semester] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                </ul>
            </div></td>
                                </tr>";
        }
                        echo"
                            </tbody></table>
                    </div>
                </div>
            </div>
        </div>
        </div>";			
        
        ////////////////input admin			
        
        echo"			
        <div class='col-lg-12'>
                <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                    <h4 class='modal-title' id='H3'>Input Data</h4>
                                </div>
                                <div class='modal-body'>
                                   <form role='form' method='post' action='input.php?aksi=inputsemester'>
                                    <label>Nama Semester</label>
                                    <input type='text' class='form-control' name='nama_semester'/><br>
                                    <label>Tahun Semester</label>
                                    <input type='text' class='form-control' name='tahun_semester'/><br>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-primary'>Save </button>
                                </div>
            </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>			
        "; 
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////
        
        elseif($_GET['aksi']=='editsemester'){
        $tebaru=mysqli_query($koneksi," SELECT * FROM semester WHERE id_semester=$_GET[id_semester] ");
        $t=mysqli_fetch_array($tebaru);
        echo"
        <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>EDIT  $t[nama_semester] $t[id_semester]
                </div>
                <div class='panel-body'>
        <form id='form1'  method='post' action='edit.php?aksi=proseseditsemester&id_semester=$t[id_semester]'>
        <label>Nama Semester</label>
        <input type='text' class='form-control' value='$t[nama_semester]' name='nama_semester'/><br>
        <label>Tahun Semester</label>
        <input type='text' class='form-control' value='$t[tahun_semester]' name='tahun_semester'/><br>
        <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-primary'>Save </button>
                                </div> </div>
        </form></div> </div></div></div>
        ";
        }
    
elseif($_GET['aksi']=='mahasiswa'){
            echo"<div class='row'>
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>INFORMASI 
                    </div>
                    <div class='panel-body'>	
            <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                            Tambah Data
                        </button> </br>
                           <div class='table-responsive'>		
            <table id='example1' class='table table-bordered table-striped'>
                                <thead>
                                    <tr> 
                                        <th>No</th>
                                        <th>NIM </th>	
                                        <th>Nama </th>	 
                                         <th>AKSI</th>	
                                    </tr>
                                </thead><tbody>
                ";
            
            $no=0;
            $sql=mysqli_query($koneksi," SELECT * FROM mahasiswa ORDER BY id_mahasiswa ASC");
            while ($t=mysqli_fetch_array($sql)){	
            $no++;
                                echo"
                                    <tr><td>$no</td>
                                    <td>$t[nim]</td> 
                                        <td>$t[nama_mahasiswa]</td> 
                        <td><div class='btn-group'>
                  <button type='button' class='btn btn-info'>AKSI</button>
                  <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                    <span class='caret'></span>
                    <span class='sr-only'>Toggle Dropdown</span>
                  </button>
                  <ul class='dropdown-menu' role='menu'>
                    <li><a href='proses.php?aksi=editmahasiswa&id_mahasiswa=$t[id_mahasiswa]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                    <li><a href='hapus.php?aksi=hapusmahasiswa&id_mahasiswa=$t[id_mahasiswa]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_mahasiswa] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                    </ul>
                </div></td>
                                    </tr>";
            }
                            echo"
                                </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
            </div>";			
            
            ////////////////input admin			
            
            echo"			
            <div class='col-lg-12'>
                    <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                        <h4 class='modal-title' id='H3'>Input Data</h4>
                                    </div>
                                    <div class='modal-body'>
                                       <form role='form' method='post' action='input.php?aksi=inputmahasiswa'>
                                        <label>Nama</label>
                                        <input type='text' class='form-control' name='nama_mahasiswa'/><br>
                                        <label>NIM</label>
                                        <input type='text' class='form-control' name='nim'/><br>
                                        <label>Email</label>
                                        <input type='text' class='form-control' name='email_mahasiswa'/><br>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        <button type='submit' class='btn btn-primary'>Save </button>
                                    </div>
                </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>			
            "; 
            }
 /////////////////////////////////////////////////////////////////////////////////////////////////
            
 elseif($_GET['aksi']=='editmahasiswa'){
            $tebaru=mysqli_query($koneksi," SELECT * FROM mahasiswa WHERE id_mahasiswa=$_GET[id_mahasiswa] ");
            $t=mysqli_fetch_array($tebaru);
            echo"
            <div class='row'>
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>EDIT  $t[nama_mahasiswa] $t[id_mahasiswa]
                    </div>
                    <div class='panel-body'>
            <form id='form1'  method='post' action='edit.php?aksi=proseseditmahasiswa&id_mahasiswa=$t[id_mahasiswa]'>
            <label>Nama</label>
            <input type='text' class='form-control' value='$t[nama_mahasiswa]' name='nama_mahasiswa'/><br>
            <label>NIM</label>
            <input type='text' class='form-control' value='$t[nim]' name='nim'/><br>
            <label>Email</label>
            <input type='text' class='form-control' value='$t[email_mahasiswa]' name='email_mahasiswa'/><br>
            <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        <button type='submit' class='btn btn-primary'>Save </button>
                                    </div> </div>
            </form></div> </div></div></div>
            ";
}
elseif($_GET['aksi']=='pertanyaan'){
                echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> </br>
                               <div class='table-responsive'>		
                <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr> 
                                            <th>No</th>
                                            <th>Nama pertanyaan</th>	
                                            <th>status</th> 
                                             <th>AKSI</th>	
                                        </tr>
                                    </thead><tbody>
                    ";
                
                $no=0;
                $sql=mysqli_query($koneksi," SELECT * FROM pertanyaan ORDER BY id_pertanyaan ASC");
                while ($t=mysqli_fetch_array($sql)){	
                $no++;
                                    echo"
                                        <tr><td>$no</td>
                                            <td>$t[nama_pertanyaan]</td> 
                                            <td>$t[status_pertanyaan]</td> 
                            <td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>AKSI</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='proses.php?aksi=editpertanyaan&id_pertanyaan=$t[id_pertanyaan]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                        <li><a href='hapus.php?aksi=hapuspertanyaan&id_pertanyaan=$t[id_pertanyaan]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pertanyaan] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
                }
                                echo"
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>";			
                
                ////////////////input admin			
                
                echo"			
                <div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data</h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputpertanyaan'>
                                            <label>Nama pertanyaan</label>
                                            <input type='text' class='form-control' name='nama_pertanyaan'/><br>
                                            <label>Pilih Status Pertanyaan</label>
                                            <select class='form-control select2' style='width: 100%;' name=status_pertanyaan>
                                            <option value='' selected>Pilih Tiket</option>
                                            <option value='pilihan'>Pilihan</option>
                                            <option value='jawaban'>Jawaban Singkat</option>
                                            </select><br><br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
                    </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>			
                "; 
 }
  /////////////////////////////////////////////////////////////////////////////////////////////////
                
 elseif($_GET['aksi']=='editpertanyaan'){
                $tebaru=mysqli_query($koneksi," SELECT * FROM pertanyaan WHERE id_pertanyaan=$_GET[id_pertanyaan] ");
                $t=mysqli_fetch_array($tebaru);
                echo"
                <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_pertanyaan] $t[id_pertanyaan]
                        </div>
                        <div class='panel-body'>
                <form id='form1'  method='post' action='edit.php?aksi=proseseditpertanyaan&id_pertanyaan=$t[id_pertanyaan]'>
                <label>Nama pertanyaan</label>
                <input type='text' class='form-control' value='$t[nama_pertanyaan]' name='nama_pertanyaan'/><br>
               
                <label>Pilih Status Pertanyaan</label>
                                            <select class='form-control select2' style='width: 100%;' name=status_pertanyaan>
                                            <option value='$t[status_pertanyaan]' selected>$t[status_pertanyaan]</option>
                                            <option value='pilihan'>Pilihan</option>
                                            <option value='jawaban'>Jawaban Singkat</option>
                                            </select><br><br>
                <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
                </form></div> </div></div></div>
                ";
 }

 elseif($_GET['aksi']=='jawaban'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                    Tambah Data
                </button> </br>
                   <div class='table-responsive'>		
    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Nama Pertanyaan</th>
                                <th>Nama jawab</th>	 
                                 <th>AKSI</th>	
                            </tr>
                        </thead><tbody>
        ";
    
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM pertanyaan,jawaban WHERE pertanyaan.id_pertanyaan=jawaban.id_pertanyaan ORDER BY jawaban.id_jawaban ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                        echo"
                            <tr><td>$no</td>
                            <td>$t[nama_pertanyaan]</td> 
                                <td>$t[nama_jawaban]</td> 
                <td><div class='btn-group'>
          <button type='button' class='btn btn-info'>AKSI</button>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='proses.php?aksi=editjawaban&id_jawaban=$t[id_jawaban]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
            <li><a href='hapus.php?aksi=hapusjawaban&id_jawaban=$t[id_jawaban]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_jawaban] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div></td>
                            </tr>";
    }
                    echo"
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
    </div>";			
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                <h4 class='modal-title' id='H3'>Input Data</h4>
                            </div>
                            <div class='modal-body'>
                               <form role='form' method='post' action='input.php?aksi=inputjawaban'>
                                
                                <label>Pilih  Pertanyaan</label>
                                <select class='form-control select2' style='width: 100%;' name=id_pertanyaan>
                                <option value='' selected>Pilih Tiket</option>"; 
                                 $sql=mysqli_query($koneksi,"SELECT * FROM pertanyaan ORDER BY id_pertanyaan");
                                 while ($c=mysqli_fetch_array($sql))
                                 {
                                    echo "<option value=$c[id_pertanyaan]>$c[nama_pertanyaan]</option>";
                                 }
                                    echo "
                                </select><br><br>
                                <label>Nama jawaban</label>
                                <input type='text' class='form-control' name='nama_jawaban'/><br>
                                <label>Nilai jawaban</label>
                                <input type='text' class='form-control' name='nilai_jawaban'/><br>    
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div>
        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>			
    "; 
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    
    elseif($_GET['aksi']=='editjawaban'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM jawaban WHERE id_jawaban=$_GET[id_jawaban] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>EDIT  $t[nama_jawaban] $t[id_jawaban]
            </div>
            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditjawaban&id_jawaban=$t[id_jawaban]'>

    <label>Pilih  Pertanyaan</label>
                                <select class='form-control select2' style='width: 100%;' name=id_pertanyaan>
                                <option value='$t[id_pertanyaan]' selected>$t[id_pertanyaan]</option>"; 
                                 $sql=mysqli_query($koneksi,"SELECT * FROM pertanyaan ORDER BY id_pertanyaan");
                                 while ($c=mysqli_fetch_array($sql))
                                 {
                                    echo "<option value=$c[id_pertanyaan]>$c[nama_pertanyaan]</option>";
                                 }
                                    echo "
                                </select><br><br> 
                                label>Nama jawaban</label>
                                <input type='text' class='form-control' value='$t[nama_jawaban]' name='nama_jawaban'/><br>     
                                label>Nilai jawaban</label>
                                <input type='text' class='form-control' value='$t[nilai_jawaban]' name='nilai_jawaban'/><br>           
    <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div> </div>
    </form></div> </div></div></div>
    ";
    }
?>