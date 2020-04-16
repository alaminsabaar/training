<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbName = "data_diri";

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

$sqlTableData = "
	create table if not exists data(
		iddata int auto_increment not null primary key,
		nim int not null default 0,
		nama varchar (40) not null,
		jk enum "Laki-Laki","Perempuan",
		telepon int not null default 0,
		alamat varchar(200) not null default '',
		foto varchar(70) not null default '',
		KEY(nama)
	)";
mysqli_query ($kon, $sqlTableData) or 
	die("Gagal Buat Table data");

 ?>