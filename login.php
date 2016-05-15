<?php
if (isset($_COOKIE["login"])) {
	header('Location: http://mypartest.com/main.php');
}
if (!isset($_COOKIE["time"]) && $_COOKIE["bad_login"]>0) {
	echo '<p>Неверный логин или пароль!</p>';
}
if (isset($_COOKIE["time"])) {
	$sec = 300 - (time() - $_COOKIE["time"]);
	echo "Попробуйте еще раз через ".$sec." секунд";
}
?>
<center>
<form action='index.php' method='post'>
	<table>
		<tr>
			<td>
				<label for="login">login</label>
			</td>
			<td>
				<input name='login' type='text' id='login' />
			</td>
		</tr>
		<tr>
			<td>
				<label for="password">password</label>
			</td>
			<td>
				<input name='password' type='text' id='password' />
			</td>
		</tr>
		<tr>
			<td>
				<input type='submit' value='login' />
			</td>
		</tr>
	</table>
</form>
</center>