<fieldset style="width : 300px">
	<h2>.:: LOGIN ::.</h2><hr>
	<form action="admin.php" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" placeholder="username"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass" placeholder="password"/></td>
			</tr>
		</table><hr>
		<button name="login">Login</button>
	</form>
</fieldset>
<?php 
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['pass']);
 ?>
