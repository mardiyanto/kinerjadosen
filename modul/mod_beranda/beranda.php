<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_agenda/aksi_agenda.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';  
?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
<?php

  switch($act){
    // Tampil Agenda
    default:
  
 // echo "tingkat session  = ".$_SESSION['tingkat'];
?>
              
		    
			
			
			<div class="row">
			<div class="col-md-12" style="height: 400px; margin:20 auto">
          <!-- general form elements -->
          <div class="box box-primary">
		  <div id="belanja" style="width: 97%; height: 400px; margin: 5 auto"></div>
		  </div>
		  </div>
		  
		  <!--
		  <div class="col-md-6" style="height: 400px; margin: 5 auto">
         
          <div class="box box-primary">
		  <div id="kas_bank" style="min-width: 100%; height: 400px; margin: 5 auto"></div>
		  </div>
		  </div>
			-->
			</div>
                
              
<?php
	break;
	
  }
?>
            </div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.section -->
<?php
}
?>

<script type="text/javascript">

<?php
$tahun=date("Y");

if($_SESSION['leveluser']=="user"){
	$string2="SELECT a.`nama_sekolah` AS nama_sekolah,b.kecamatan AS kecamatan from sekolah a,kecamatan b where a.kecamatan=b.id and a.id='".$_SESSION['tingkat']."'";
	$temp2=mysqli_query($konek,$string2);
	$r2=mysqli_fetch_array($temp2);
	$sekolah=$r2['nama_sekolah'];
}
elseif($_SESSION['leveluser']=="kecamatan"){
	$string="select * from kecamatan  where  id='".$_SESSION['tingkat']."'";
	$temp=mysqli_query($konek,$string);
	$r=mysqli_fetch_array($temp);
	$sekolah=" KECAMATAN ".$r['kecamatan'];
}
else{
	$sekolah="KABUPATEN BLITAR";
}

//$sekolah="KABUPATEN BLITAR";
?>

Highcharts.chart('belanja', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'BELANJA DANA BOS <?php echo $tahun;?>'
    },
	credits:{
		text: 'blitarkab.go.id',
		href: 'https://blitarkab.go.id'
	},
    subtitle: {
        text: ' <?php echo $sekolah;?>'
    },
    xAxis: {
        categories: [
            'Triwulan 1',
            'Triwulan 2',
            'Triwulan 3',
            'Triwulan 4'
           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah (Rp)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.2f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
		<?php
    $id_ses=$_SESSION['tingkat'];
    
		if($_SESSION['leveluser']=="user"){
		
        /*
        $string="
		SELECT b.`uraian` AS uraian,
SUM(IF(triwulan='1', jumlah,0)) AS triwulan1,
SUM(IF(triwulan='2', jumlah,0)) AS triwulan2,
SUM(IF(triwulan='3', jumlah,0)) AS triwulan3,
SUM(IF(triwulan='4', jumlah,0)) AS triwulan4
FROM belanja a, index1 b, rekening c
WHERE a.`kode_rekening`=c.`kode_rekening` AND c.`id_index`=b.`id` AND a.`id_sekolah`='".$_SESSION['tingkat']."' AND a.`tahun`='$tahun'
GROUP BY b.`uraian`
ORDER BY b.id ASC
		";
        */
        
        $string ="
        SELECT b.`uraian` AS uraian,
SUM(IF(triwulan='1', jumlah,0)) AS triwulan1,
SUM(IF(triwulan='2', jumlah,0)) AS triwulan2,
SUM(IF(triwulan='3', jumlah,0)) AS triwulan3,
SUM(IF(triwulan='4', jumlah,0)) AS triwulan4

FROM belanja a, index1 b, rekening c,kecamatan d,sekolah e
WHERE a.`kode_rekening`=c.`kode_rekening` AND c.`id_index`=b.`id` AND a.`id_sekolah`=e.`id` AND e.`kecamatan`=d.`id`  AND a.`tahun`='$tahun' AND a.id_sekolah='".$_SESSION['tingkat']."'
GROUP BY b.`uraian`
ORDER BY b.id,a.`kode_rekening` ASC
        ";
		}
		elseif($_SESSION['leveluser']=="kecamatan"){
		$string="
		SELECT b.`uraian` AS uraian,
SUM(IF(triwulan='1', jumlah,0)) AS triwulan1,
SUM(IF(triwulan='2', jumlah,0)) AS triwulan2,
SUM(IF(triwulan='3', jumlah,0)) AS triwulan3,
SUM(IF(triwulan='4', jumlah,0)) AS triwulan4

FROM belanja a, index1 b, rekening c,kecamatan d,sekolah e
WHERE a.`kode_rekening`=c.`kode_rekening` AND c.`id_index`=b.`id` AND a.`id_sekolah`=e.`id` AND e.`kecamatan`=d.`id`  AND a.`tahun`='$tahun' AND d.id='".$_SESSION['tingkat']."' AND e.tingkat LIKE '%sd%'
GROUP BY b.`uraian`
ORDER BY b.id,a.`kode_rekening` ASC;
		";	
		}
		elseif($_SESSION['leveluser']=="admin"){
		$string="
		SELECT b.`uraian` AS uraian,
SUM(IF(triwulan='1', jumlah,0)) AS triwulan1,
SUM(IF(triwulan='2', jumlah,0)) AS triwulan2,
SUM(IF(triwulan='3', jumlah,0)) AS triwulan3,
SUM(IF(triwulan='4', jumlah,0)) AS triwulan4

FROM belanja a, index1 b, rekening c,kecamatan d,sekolah e
WHERE a.`kode_rekening`=c.`kode_rekening` AND c.`id_index`=b.`id` AND a.`id_sekolah`=e.`id` AND e.`kecamatan`=d.`id`  AND a.`tahun`='$tahun'
GROUP BY b.`uraian`
ORDER BY b.id,a.`kode_rekening` ASC
		";	
		}
    
   /*
    $string="
		SELECT b.`uraian` AS uraian,
SUM(IF(triwulan='1', jumlah,0)) AS triwulan1,
SUM(IF(triwulan='2', jumlah,0)) AS triwulan2,
SUM(IF(triwulan='3', jumlah,0)) AS triwulan3,
SUM(IF(triwulan='4', jumlah,0)) AS triwulan4

FROM belanja a, index1 b, rekening c,kecamatan d,sekolah e
WHERE a.`kode_rekening`=c.`kode_rekening` AND c.`id_index`=b.`id` AND a.`id_sekolah`=e.`id` AND e.`kecamatan`=d.`id`  AND a.`tahun`='$tahun'
GROUP BY b.`uraian`
ORDER BY b.id,a.`kode_rekening` ASC
		";	
		*/
		
		$temp=mysqli_query($konek,$string);
		$row=mysqli_num_rows($temp);
		$i=1;
		while ($r=mysqli_fetch_array($temp)){
			if($i<$row){
				echo "name: '$r[uraian]',";
				echo " data: [$r[triwulan1], $r[triwulan2], $r[triwulan3], $r[triwulan4]]";
				echo " }, {";
				
			}
			else{
				echo "name: '$r[uraian]',";
				echo " data: [$r[triwulan1], $r[triwulan2], $r[triwulan3], $r[triwulan4]]";
				
				
			}
			$i++;
		}
		?>
		/*
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7]
		
		
		*/
		

    }]
});
		</script>
