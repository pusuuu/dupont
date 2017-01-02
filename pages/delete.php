<?php
include "koneksi.php";

$modul=$_GET['modul'];
$id  = $_GET['id'];

//DELETE barang
if ($modul=='barang'){
	
  	$query= "DELETE FROM barang WHERE kd_barang='$id'";
  	$sql= mysqli_query($con,$query) or die(mysqli_error($con));
  	header('location:masBarang.php');
}

//DELETE divisi
if ($modul=='divisi'){
	
  	$query= "DELETE FROM divisi WHERE kd_divisi='$id'";
  	$sql= mysqli_query($con,$query) or die(mysqli_error($con));
  	header('location:masDivisi.php');
}

//DELETE supplier
if ($modul=='gudang'){
	
  	$query= "DELETE FROM gudang WHERE kd_gudang='$id'";
  	$sql= mysqli_query($con,$query) or die(mysqli_error($con));
  	header('location:masGudang.php');
}

//DELETE karyawan
if ($modul=='karyawan'){
	
  	$query= "DELETE FROM user WHERE kd_user='$id'";
  	$sql= mysqli_query($con,$query) or die(mysqli_error($con));
  	header('location:masKaryawan.php');
}

//DELETE supplier
if ($modul=='supplier'){
  
    $query= "DELETE FROM supplier WHERE kd_supplier='$id'";
    $sql= mysqli_query($con,$query) or die(mysqli_error($con));
    header('location:masSupplier.php');
}
?>