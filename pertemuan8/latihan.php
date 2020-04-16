<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbName = "latihan7";

	$kon = mysqli_connect($host, $user, $pass);
	if (!$kon) {
		die("Gagal Koneksi...");
	}
	$hasil = mysqli_select_db($kon, $dbName);
	if(!$hasil){
		$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
		if(!$hasil)
			die("Gagal buat database...");
		else{
			$hasil = mysqli_select_db($kon, $dbName);
		}
		if(!$hasil)
			die("gagal Konek Database");
	}

$sqlTableAdmin = "
	create table if not exists admin(
		id int auto_increment not null primary key,
		username varchar(40) not null,
		password varchar(6) not null,
		KEY(username))";

mysqli_query ($kon, $sqlTableAdmin) or 
	die("Gagal Buat Table Admin");
echo "admin sukses";