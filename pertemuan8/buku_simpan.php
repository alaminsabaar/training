<?php
$kode    = $_POST['kode'];
$judulbuku   = $_POST['judul'];
$pengarang    = $_POST['pengarang'];
$penerbit    = $_POST['penerbit'];
$jumlahstok   = $_POST['stok'];
$proses  = $_POST['proses'];

$foto		=$_FILES['foto']['name'];
$tmpName	=$_FILES['foto']['tmp_name'];
$size		=$_FILES['foto']['size'];
$type		=$_FILES['foto']['type'];

$maxsize  =1500000;
$typeYgBoleh=array("image/jpeg","image/png","image/pjpeg");
$dirFoto ="pict";
if(!is_dir($dirFoto)) 
mkdir($dirFoto) ;
$fileTujuanFoto = $dirFoto."/".$foto;

$dirThumb ="thumb";
if(!is_dir($dirThumb))
mkdir($dirThumb);
$fileTujuanThumb   =$dirThumb."/t_".$foto;

$dataValid="YA";

if ($size > 0 ){
if($size > $maxsize){
echo"Ukuran file TerlaluBesar<br/>";
$dataValid ="TIDAK";
}
if(!in_array($type, $typeYgBoleh)) {
echo "Type File TidakDiKenal	<br/>";
$dataValid = "TIDAK";
}}

if (strlen(trim($kode))==0) {
echo "NamaBarangHarusDiisi! <br />";
$dataValid = "TIDAK";
}
if (strlen(trim($kode))==0) {
echo "HargaHarusDiisi! <br />";
$dataValid = "TIDAK";
}

if ($dataValid == "TIDAK") {
echo "Masih Ada Kesalahan, silakanperbaiki! </br>";
echo "<input type='button' value='Kembali'
onClick='self'.history.back()'>";
exit;
}

include "koneksi2.php";
if ($proses == "Simpan") {
$sql = "insert into buku
(kode,judul,pengarang,penerbit,stok,foto)
values 
('$kode','$judulbuku','$pengarang','$penerbit','$jumlahstok','$foto')";
}
$hasil = mysqli_query($kon,$sql);
if (!$hasil) {
echo "GagalSimpan, silakan diulangi! <br /> ";
mysqli_error($kon);
echo "<input type='buton' value='Kembali'
onClick='self.history.back()'>";
exit;
} if ($size > 0)
$perluUplod =TRUE;
else
$perluUplod =FALSE;

if ( $perluUplod ) {
if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
echo "Gagal Upload Gambar..<br/>";
echo "<a href='barang_tampil.php'>DaftarBarang</a>";
exit;
}else{
buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
}
}

echo " Data sudah disimpan, dan file berhasil di upload";

function buat_thumbnail($file_src, $file_dst){
//-- hapusjikathumbnailsebelumnyasudahada
list($w_src,$h_src,$type) = getImageSize($file_src);

switch ($type) {
case 1: // gif -> jpg
$img_src = imagecreatefromgif($file_src);
break;
case 2: // jpeg -> jpg 
$img_src = imagecreatefromjpeg($file_src);
break;
case 3: // png -> jpg
$img_src = imagecreatefrompng($file_src);
break;
}

$thumb = 100; //---max. size untuk thumb ---
if ($w_src> $h_src){
$w_dst = $thumb; //--- landscape ---
$h_dst = round($thumb / $w_src * $h_src);
}else{
$w_dst = round($thumb / $h_src * $w_src); //--- portrait ---
$h_dst = $thumb;
}

$img_dst = imagecreatetruecolor($w_dst, $h_dst); // resample

imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0,
$w_dst, $h_dst, $w_src, $h_src); 
imagejpeg($img_dst, $file_dst);  // simpanthumbnail
//-- bersihkanmemori
imagedestroy($img_src);
imagedestroy($img_dst);
}