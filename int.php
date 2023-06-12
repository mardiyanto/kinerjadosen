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
elseif($_GET['aksi']=='kelas'){
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
                                <th>Nama kelas</th>	 
                                 <th>AKSI</th>	
                            </tr>
                        </thead><tbody>
        ";
    
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM kelas ORDER BY id_kelas ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                        echo"
                            <tr><td>$no</td>
                                <td>$t[nama_kelas]</td> 
                <td><div class='btn-group'>
          <button type='button' class='btn btn-info'>AKSI</button>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='proses.php?aksi=editkelas&id_kelas=$t[id_kelas]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
            <li><a href='hapus.php?aksi=hapuskelas&id_kelas=$t[id_kelas]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_kelas] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
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
                               <form role='form' method='post' action='input.php?aksi=inputkelas'>
                                <label>Nama kelas</label>
                                <input type='text' class='form-control' name='nama_kelas'/><br>
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
    
elseif($_GET['aksi']=='editkelas'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM kelas WHERE id_kelas=$_GET[id_kelas] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>EDIT  $t[nama_kelas] $t[id_kelas]
            </div>
            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditkelas&id_kelas=$t[id_kelas]'>
    <label>Nama kelas</label>
    <input type='text' class='form-control' value='$t[nama_kelas]' name='nama_kelas'/><br>
    <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div> </div>
    </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='jadwal'){
    $days = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $hours = array();
    for ($hour = 0; $hour < 12; $hour++) {
        $formattedHour = str_pad($hour, 2, '0', STR_PAD_LEFT);
        $hours[] = $formattedHour . ':00 AM';
    }
    
    for ($hour = 1; $hour <= 12; $hour++) {
        $formattedHour = str_pad($hour, 2, '0', STR_PAD_LEFT);
        $hours[] = $formattedHour . ':00 PM';
    }   
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
                                <th>Hari</th>	 
                                <th>Matakuliah</th>	
                                <th>Nama dosen</th>
                                 <th>AKSI</th>	
                            </tr>
                        </thead><tbody>
        ";
    
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM jadwal,matakul,dosen,kelas,semester,ruangan WHERE jadwal.id_dosen=dosen.id_dosen 
    and jadwal.id_matakul=matakul.id_matakul and jadwal.id_kelas=kelas.id_kelas and jadwal.id_semester=semester.id_semester 
    and jadwal.id_ruangan=ruangan.id_ruangan ORDER BY jadwal.id_jadwal ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                        echo"
                            <tr><td>$no</td>
                                <td>$t[hari_jadwal]<br>
                                <h6> kelas :$t[nama_kelas]</h6>
                                <h6>ruangan:$t[nama_ruangan]</h6></td> 
                                <td>$t[nama_matakul]<br>
                                <h6> jam mulai :$t[jam_mulai]</h6>
                                <h6> jam selesai:$t[jam_selesai]</h6></td> 
                                <td>$t[nama_dosen]<br>
                                <h6> semester : $t[nama_semester] $t[tahun_semester]</h6></td> 
                <td><div class='btn-group'>
          <button type='button' class='btn btn-info'>AKSI</button>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='proses.php?aksi=editjadwal&id_jadwal=$t[id_jadwal]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
            <li><a href='hapus.php?aksi=hapusjadwal&id_jadwal=$t[id_jadwal]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_jadwal] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
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
                               <form role='form' method='post' action='input.php?aksi=inputjadwal'>

                                <label>Pilih  Hari</label>
                                <select class='form-control select2' style='width: 100%;' name='hari_jadwal'>
                                                <option  selected>Pilih hari</option>";
                                                foreach ($days as $day) {
                                                    echo "<option value=$day>$day</option>";
                                                 } 
                                 echo" </select><br>
                                 <label>Pilih  Jam mulai</label>
                                 <select class='form-control select2' style='width: 100%;' name='jam_mulai'>
                                                 <option  selected>Pilih jam</option>";
                                                 foreach ($hours as $hour) {
                                                     echo "<option value=$hour>$hour</option>";
                                                  } 
                                  echo" </select><br>
                                  <label>Pilih  Jam Selesai</label>
                                  <select class='form-control select2' style='width: 100%;' name='jam_selesai'>
                                                  <option  selected>Pilih jam</option>";
                                                  foreach ($hours as $hour) {
                                                      echo "<option value=$hour>$hour</option>";
                                                   } 
                                   echo" </select><br>
                                <label>Pilih  Kelas</label>
                                <select class='form-control select2' style='width: 100%;' name='id_kelas'>
                                                <option  selected>Pilih kelas</option>";
                                               $sql=mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY id_kelas");
                                                 while ($c=mysqli_fetch_array($sql))
                                                 {
                                                    echo "<option value=$c[id_kelas]>$c[nama_kelas]</option>";
                                                 } 
                                                echo" </select><br>
                                 <label>Pilih  Ruangan</label>
                                    <select class='form-control select2' style='width: 100%;' name='id_ruangan'>
                                                                <option  selected>Pilih ruangan</option>";
                                                               $sql=mysqli_query($koneksi,"SELECT * FROM ruangan ORDER BY id_ruangan");
                                                                 while ($c=mysqli_fetch_array($sql))
                                                                 {
                                                                    echo "<option value=$c[id_ruangan]>$c[nama_ruangan]</option>";
                                                                 } 
                                      echo" </select><br>
                                    <label>Pilih  Dosen</label>
                                    <select class='form-control select2' style='width: 100%;' name='id_dosen'>
                                                                <option  selected>Pilih Dosen</option>";
                                                               $sql=mysqli_query($koneksi,"SELECT * FROM dosen ORDER BY id_dosen");
                                                                 while ($c=mysqli_fetch_array($sql))
                                                                 {
                                                                    echo "<option value=$c[id_dosen]>$c[nama_dosen]</option>";
                                                                 } 
                                    echo" </select><br>
                
                                <label>Pilih  Mata Kuliah</label>
                                <select class='form-control select2' style='width: 100%;' name='id_matakul'>
                                                <option  selected>Pilih Dosen</option>";
                                             $sql=mysqli_query($koneksi,"SELECT * FROM matakul ORDER BY id_matakul");
                                                 while ($c=mysqli_fetch_array($sql))
                                                 {
                                                    echo "<option value=$c[id_matakul]>$c[nama_matakul]</option>";
                                                 } echo"
                                                </select><br>
                    
                                <label>Pilih  Semester</label>
                                <select class='form-control select2' style='width: 100%;' name='id_semester'>
                                                <option  selected>Pilih Dosen</option> ";
                                               $sql=mysqli_query($koneksi,"SELECT * FROM semester ORDER BY id_semester");
                                                 while ($c=mysqli_fetch_array($sql))
                                                 {
                                                    echo "<option value=$c[id_semester]>$c[nama_semester]</option>";
                                                 }
                                                 echo"
                                                </select><br>
                     
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
    
elseif($_GET['aksi']=='editjadwal'){
    $days = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $hours = array();
    for ($hour = 0; $hour < 12; $hour++) {
        $formattedHour = str_pad($hour, 2, '0', STR_PAD_LEFT);
        $hours[] = $formattedHour . ':00 AM';
    }
    
    for ($hour = 1; $hour <= 12; $hour++) {
        $formattedHour = str_pad($hour, 2, '0', STR_PAD_LEFT);
        $hours[] = $formattedHour . ':00 PM';
    }
    $tebaru=mysqli_query($koneksi," SELECT * FROM jadwal,matakul,dosen,kelas,semester,ruangan WHERE jadwal.id_dosen=dosen.id_dosen 
    and jadwal.id_matakul=matakul.id_matakul and jadwal.id_kelas=kelas.id_kelas and jadwal.id_semester=semester.id_semester 
    and jadwal.id_ruangan=ruangan.id_ruangan and  jadwal.id_jadwal=$_GET[id_jadwal]");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>EDIT   $t[id_jadwal]
            </div>
            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditjadwal&id_jadwal=$t[id_jadwal]'>
    <label>Pilih  Hari</label>
    <select class='form-control select2' style='width: 100%;' name='hari_jadwal'>
                    <option  value='$t[hari_jadwal]' selected>$t[hari_jadwal]</option>";
                    foreach ($days as $day) {
                        echo "<option value=$day>$day</option>";
                     } 
     echo" </select><br>
     <label>Pilih  Jam mulai</label>
     <select class='form-control select2' style='width: 100%;' name='jam_mulai'>
     <option  value='$t[jam_mulai]' selected>$t[jam_mulai]</option>";
                     foreach ($hours as $hour) {
                         echo "<option value=$hour>$hour</option>";
                      } 
      echo" </select><br>
      <label>Pilih  Jam Selesai</label>
      <select class='form-control select2' style='width: 100%;' name='jam_selesai'>
      <option  value='$t[jam_selesai]' selected>$t[jam_selesai]</option>";
                      foreach ($hours as $hour) {
                          echo "<option value=$hour>$hour</option>";
                       } 
       echo" </select><br>
    <label>Pilih  Kelas</label>
    <select class='form-control select2' style='width: 100%;' name='id_kelas'>
    <option  value='$t[id_kelas]' selected>$t[nama_kelas]</option>";
                   $sql=mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY id_kelas");
                     while ($c=mysqli_fetch_array($sql))
                     {
                        echo "<option value=$c[id_kelas]>$c[nama_kelas]</option>";
                     } 
                    echo" </select><br>
     <label>Pilih  Ruangan</label>
        <select class='form-control select2' style='width: 100%;' name='id_ruangan'>
        <option  value='$t[id_ruangan]' selected>$t[nama_ruangan]</option>";
                                   $sql=mysqli_query($koneksi,"SELECT * FROM ruangan ORDER BY id_ruangan");
                                     while ($c=mysqli_fetch_array($sql))
                                     {
                                        echo "<option value=$c[id_ruangan]>$c[nama_ruangan]</option>";
                                     } 
          echo" </select><br>
        <label>Pilih  Dosen</label>
        <select class='form-control select2' style='width: 100%;' name='id_dosen'>
        <option  value='$t[id_dosen]' selected>$t[nama_dosen]</option>";
                                   $sql=mysqli_query($koneksi,"SELECT * FROM dosen ORDER BY id_dosen");
                                     while ($c=mysqli_fetch_array($sql))
                                     {
                                        echo "<option value=$c[id_dosen]>$c[nama_dosen]</option>";
                                     } 
        echo" </select><br>

    <label>Pilih  Mata Kuliah</label>
    <select class='form-control select2' style='width: 100%;' name='id_matakul'>
    <option  value='$t[id_matakul]' selected>$t[nama_matakul]</option>";
                 $sql=mysqli_query($koneksi,"SELECT * FROM matakul ORDER BY id_matakul");
                     while ($c=mysqli_fetch_array($sql))
                     {
                        echo "<option value=$c[id_matakul]>$c[nama_matakul]</option>";
                     } echo"
                    </select><br>

    <label>Pilih  Semester</label>
    <select class='form-control select2' style='width: 100%;' name='id_semester'>
    <option  value='$t[id_semester]' selected>$t[nama_semester]</option>";
                   $sql=mysqli_query($koneksi,"SELECT * FROM semester ORDER BY id_semester");
                     while ($c=mysqli_fetch_array($sql))
                     {
                        echo "<option value=$c[id_semester]>$c[nama_semester]</option>";
                     }
                     echo"
                    </select><br>
    <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save </button>
                            </div> </div>
    </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='penilaian'){
    echo"
    <div class='row'>";
     // Mendapatkan data penilaian berdasarkan id_dosen
     $query_penilaian = "SELECT penilaian.id_dosen, matakul.nama_matakul, dosen.nama_dosen, dosen.status_dos, COUNT(*) AS jumlah_penilaian, SUM(penilaian.nilai) AS total_nilai, AVG(penilaian.nilai) AS rata_nilai
     FROM penilaian
     JOIN matakul ON penilaian.id_matakul = matakul.id_matakul
     JOIN dosen ON penilaian.id_dosen = dosen.id_dosen
     JOIN jawaban ON penilaian.id_jawaban = jawaban.id_jawaban
     GROUP BY dosen.id_dosen, matakul.id_matakul
     ORDER BY total_nilai DESC";

$result_penilaian = mysqli_query($koneksi, $query_penilaian);

$peringkat = 1; // Variabel untuk menyimpan peringkat awal
while ($row = mysqli_fetch_assoc($result_penilaian)) {
$id_dosen = $row['id_dosen'];
$nama_matakul = $row['nama_matakul'];
$nama_dosen = $row['nama_dosen'];
$status_dos = $row['status_dos'];
$jumlah_penilaian = $row['jumlah_penilaian'];
$total_nilai = $row['total_nilai'];
$rata_nilai = $row['rata_nilai'];
    echo"
    <div class='col-md-3'>
      <!-- Widget: user widget style 1 -->
      <div class='box box-widget widget-user-2'>
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class='widget-user-header bg-yellow'>
          <div class='widget-user-image'>
            <img class='img-circle' src='assets/img/user2-160x160.jpg' alt='User Avatar'>
          </div><!-- /.widget-user-image -->
          <h3 class='widget-user-username'>$row[nama_dosen]</h3>
          <h5 class='widget-user-desc'>Matakuliah : $row[nama_matakul]</h5>
        </div>
        <div class='box-footer no-padding'>
          <ul class='nav nav-stacked'>
            <li><a href='#'>Jumlah Respoden<span class='pull-right badge bg-blue'>$jumlah_penilaian</span></a></li>
            <li><a href='#'>Total Nilai <span class='pull-right badge bg-aqua'>$total_nilai</span></a></li>
            <li><a href='#'>Rata-Rata <span class='pull-right badge bg-red'>$rata_nilai</span></a></li>
            <li><a href='#'>Peringkat <span class='pull-right badge bg-green'>$peringkat</span></a></li>
          </ul>
        </div>
      </div><!-- /.widget-user -->
    </div><!-- /.col --> ";
    $peringkat++; // Tingkatkan peringkat untuk record selanjutnya
}
echo"
</div><!-- /.row -->
    ";
}

?>