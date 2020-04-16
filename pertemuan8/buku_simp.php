<?php 
	$kode = $_POST['kode'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$stok = $_POST['stok'];
	$dataValid="YA";
	if (strlen(trim($kode))==0) {
		echo "Kode Barang Harus Diisi!<br/>";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($judul))==0) {
		echo "Judul Barang Harus Diisi!<br/>";
		$dataValid = "TIDAK";
	}
		if (strlen(trim($pengarang))==0) {
		echo "Pengarang Barang Harus Diisi!<br/>";
		$dataValid = "TIDAK";
	}
		if (strlen(trim($penerbit))==0) {
		echo "Penerbit Barang Harus Diisi!<br/>";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($stok))==0) {
		echo "Stok Barang Harus Diisi!<br/>";
		$dataValid = "TIDAK";
	}
	if ($dataValid == "TIDAK") {
		echo "Masih ada Kesalahan, silahkan perbaiki!<br/>";
		echo "<input type='button' value='kembali' onClick='self.history.back()'>";
		exit;
	}
	include "tugas.php";
	$sql = "
			insert into buku
			(kode,judul,pengarang,penerbit,stok)
			values
			('$kode','$judul','$pengarang','$penerbit',$stok)
			";
	$hasil = mysqli_query($kon, $sql);

	if (!$hasil) {
		echo "Gagal Simpan, Silahkan diulangai!<br/>";
		echo mysqli_error($kon);
		echo "<br/><input type='button' value='kembali' onClick='self.history.back()'>";
		exit;
	}else{
		echo "Simpan data berhasil";
	}