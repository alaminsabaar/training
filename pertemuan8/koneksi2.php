<?php
	error_reporting (E_ALL ^ E_DEPRECATED);
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbname = "sewabuku";
		
		$kon = mysqli_connect($host, $user, $pass);
		if (!$kon)
			die("Gagal Koneksi ...");
		
		$hasil = mysqli_select_db($kon,$dbname);
		if (!$hasil) {
			$hasil = mysqli_query ($kon,"CREATE DATABASE $dbname");
			if (!$hasil)
				die("Gagal Buat database");
			else
				$hasil = mysqli_select_db($kon, $dbname);
				if (!$hasil) die ("Gagal Konek Database");
		}
	$sqlTabelBuku = "create table if not exists buku (
						idbuku int auto_increment not null primary key,
						kode varchar(10) not null,
						judul varchar (40),
						pengarang varchar (40),
						penerbit varchar (40),
						stok int not null default 0,
						foto varchar (40) not null default '',
						KEY(idbuku))";
						
	mysqli_query ($kon,$sqlTabelBuku) or die("Gagal Buat Tabel Buku");