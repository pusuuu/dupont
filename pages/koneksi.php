<?php
	$user	  = "root";
	$server	  = "localhost";
	$pwd	  = "";
	$database = "dupont";

	$con = new mysqli($server, $user, $pwd) or die ("Gagal koneksi ke server MySQL" .mysqli_error($con));
	mysqli_select_db($con, $database) or die(mysqli_error($con));
?>