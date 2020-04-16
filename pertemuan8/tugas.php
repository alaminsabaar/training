<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "sewabuku3";

$kon = mysqli_connect($host, $user, $pass);
if (!$kon) {
	die("Gagal Koneksi...");
}
$hasil = mysqli_select_db($kon, $dbName);
if (!$hasil) {
	$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
	if (!$hasil)
		die("Gagal buat database...");
	else {
		$hasil = mysqli_select_db($kon, $dbName);
	}
	if (!$hasil)
		die("gagal Konek Database");
}
$sqlTableBuku = "
	create table if not exists buku(
		idbuku int auto_increment not null primary key,
		kode varchar(10) not null,
		judul varchar(40) not null,
		pengarang varchar(40) not null,
		penerbit varchar(40) not null,
		stok int not null default 0,
		KEY(kode))";

mysqli_query($kon, $sqlTableBuku) or
	die("Gagal Buat Table Buku");