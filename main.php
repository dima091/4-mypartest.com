<?php
if (!isset($_COOKIE["login"])) {
	header('Location: http://mypartest.com/login.php');
}
?>
<center>
<p>Добрый день, <?php echo $_COOKIE["login"];?>!</p>
<form action='index.php' method='post'>
<input type = 'hidden' name='exit' id='exit' />
<input type = 'submit' value='exit' />
</form>
</center>