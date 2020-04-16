<h2>Tambah Data Mahasiswa</h2>
<form action="simpanmhs.php" method="post" enctype="multipart/form-data">
<table>
	<tr>
		<td>NIM</td>
		<td><input type="text" name="nim"/></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"/></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td><br/>
		<td><input type="radio" name="jk" value="pria"/>Laki - laki
			<input type="radio" name="jk" value="wanita"/>Perempuan
		</td>
	</tr>
	<tr>
		<td>Telepon</td>
		<td><input type="text" name="tlpn"/></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea name="alamat">Silahkan Isi</textarea></td>
	</tr>
	<tr>
		<td>Foto</td>
		<td><input type="file" name="foto"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><hr/>
		<input type="submit" value="Simpan" name="proses"/>
		<input type="reset" value="Reset" name="reset"/>
		</td>
	</tr>
</table>
<form>