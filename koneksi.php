<?php 
	$servername ="localhost";
	$username = "root";
	$password = "";
	$dbname = "epemira1";

	$koneksi = mysqli_connect($servername, $username, $password, $dbname);

	if (mysqli_connect_errno()) {
		echo "Koneksi Database Gagal : " . mysqli_connect_error();
	}

?>