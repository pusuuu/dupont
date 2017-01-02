<?php
#Baris fungsi nomor otomatis
function AutoNumber($order,$akr){
	#baris koneksi dengan mysqli
	include ("koneksi.php");
	$tgl		= date("ym",time());
	$ambil_data = $koneksi->query("SELECT MAX (kd_pene_sup) FROM supplier");
	$urutan     = $ambil_data->fetch_row();
		if($urutan[0] == ""){
			$idAuto="$akr.".$tgl.".001";	
		}else
		if($urutan[0] <> ""){
		$data_akhir = $koneksi->query("SELECT * from ". $tabel ." order by ". $order ." desc limit 0,1");
		$urutan2	= $data_akhir->fetch_row();
		  if(substr($urutan2[0],0,8) <> "$akr.".$tgl){
			  $idAuto="$akr.".$tgl.".001";
		  }else{
			  $Counter=substr($urutan2[0],9,3)+1;
			  if($Counter < 10){
				  $idAuto="$akr.".$tgl. ".00" .$Counter;
			  }else
			  if($Counter < 100){
				  $idAuto="$akr.".$tgl. ".0" .$Counter;
			  }else
			  if($Counter < 1000){
				  $idAuto="$akr.".$tgl. "." .$Counter;
			  }
		  }
		}#akhir auto number
		return $idAuto;
}

function autogenerateid{
	$tgl = 
}
?>