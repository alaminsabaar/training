<h2>HALAMAN ADMIN</h2>
<?php 
$login = $_POST['login'];
$userName = $_POST['username'];
$pass = $_POST['pass'];
	$msg = '';
	if (isset($login) && !empty($userName) && !empty($pass)) {
		if ($userName == 'aji' && $pass == '123456') {
			$_SESSION['valid'] = true;
			$_SESSION['timeout'] = time();
			$_SESSION['username'] = 'aji';

			echo "Selamat datang $userName! anda telah berhasil login";
		}
		else{
			echo "username dan password anda salah";
		}
	}
 ?>
 <br><br><br>
<a href="form.php" tite="Logout">LOGOUT</a>