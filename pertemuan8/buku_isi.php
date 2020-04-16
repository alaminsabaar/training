<html>

<head></head>

<body style="border: 2px solid; width: 600px; margin-left: 300px;">
    <h2 style="margin-left: 10px; border-bottom: 4px solid;"> INPUT BUKU</h2>
    <form action='buku_simpan.php' method='post' enctype='multipart/form-data'>
        <table style="margin-left: 10px;">
            <tr>
                <td>Kode</td>
                <td><input type='text' name='kode' maxlength='40' size='31' /></td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td><input type='text' name='judul' maxlength='40' size='40' /></td>
            </tr>

            <tr>
                <td>Pengarang</td>
                <td><input type='text' name='pengarang' maxlength='40' size='31' /></td>
            </tr>

            <tr>
                <td>Penerbit</td>
                <td><input type='text' name='penerbit' maxlength='40' size='31' /></td>
            </tr>

            <tr>
                <td>Jumlah Stok</td>
                <td><input type='text' name='stok' maxlength='9' size='10' /></td>
            </tr>

            <tr>
                <td>Foto Sampul</td>
                <td><input type="file" name="foto" size="50"></td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="text-align: left;">
                    <input type="submit" name="proses" value="Simpan">
                    <input type="reset" name="reset" value="Reset ">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>