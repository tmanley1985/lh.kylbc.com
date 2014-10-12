<?php 
	require('inc/header.php'); 
?>
<?php 
	$admin = new Admin($db);
	$user_pass = $admin->authenticate($_POST['username'], $_POST['password']);

?>
<form method="post">
	Username: <input type="text" id="username" name="username">
	<br>
	Password: <input type="password" id="password" name="password">
	<br>
	<input type="submit" value="Login">
</form>

<?php
	require('inc/footer.php');
?>