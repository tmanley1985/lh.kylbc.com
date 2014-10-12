<?php 
	require('inc/header.php'); 
?>
<?php 
	//Instantiates Admin Object
	$admin = new Admin($db);
	//Loads the Post data into the authenticate method from the Admin class
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