<?php

if (isset($_POST['exit'])) {
	setcookie("login", '', time() - 3600);
}

if (isset($_POST['login']) && isset($_POST['password']) && !isset($_COOKIE["time"])) {
	$loc = '';
	
	$users_str = file_get_contents('users.txt');
	$users = json_decode($users_str);
	
	foreach ($users as $k => $user) {
		if ($user->login == $_POST['login'] && $user->password == $_POST['password']) {
			setcookie("login", $_POST['login']);
			$loc = 'Location: http://mypartest.com/main.php';
		}
	}
	if (!$loc) {
		setcookie('bad_login', $_COOKIE["bad_login"]+1);
		if ($_COOKIE["bad_login"]>=2) {
			setcookie('bad_login', 0);
			setcookie("time", time(), time() + 300);
		}
		$loc = 'Location: http://mypartest.com/login.php';
	}
}
else {
	setcookie('bad_login', 0);
	$loc = 'Location: http://mypartest.com/login.php';
}
header($loc);
?>

