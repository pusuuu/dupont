<?php
#Baris fungsi nomor otomatis
function autoid($tabel,$id,$kodeunik){
	#baris koneksi dengan mysqli
	include ("koneksi.php");
	$tgl		= date("ym",time());
	$ambil_data = $con->query("SELECT * from  ". $tabel ." order by ". $id ." desc");
	$urutan     = $ambil_data->fetch_row();
		if($urutan[0] == ""){
			$idAuto="$kodeunik-".$tgl."-001";	
		}else
		if($urutan[0] <> ""){
		$data_akhir = $con->query("SELECT max(". $id .") from ". $tabel ." order by ". $id ." desc limit 0,1");
		$urutan2	= $data_akhir->fetch_row();
		  if(substr($urutan2[0],0,8) <> "$kodeunik-".$tgl){
			  $idAuto="$kodeunik-".$tgl."-001";
		  }else{
			  $Counter=substr($urutan2[0],9,3)+1;
			  if($Counter < 10){
				  $idAuto="$kodeunik-".$tgl. "-00" .$Counter;
			  }else
			  if($Counter < 100){
				  $idAuto="$kodeunik-".$tgl. "-0" .$Counter;
			  }else
			  if($Counter < 1000){
				  $idAuto="$kodeunik-".$tgl. "-" .$Counter;
			  }
		  }
		}#akhir auto number
		return $idAuto;
}


?>