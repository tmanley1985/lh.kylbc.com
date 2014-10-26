<?php 
	require('inc/header.php'); 
?>
<?php 

	//Instantiates Admin Object
	$admin = new Admin($db);
	if(!empty($_POST)){
			//Loads the Post data into the authenticate method from the Admin class
			$user_pass = $admin->authenticate($_POST['username'], $_POST['password']);

	}

?>
<form method="post">
	<h4>Enter Your Username and Password</h4>
	<br>
	<label>Username: </label><input type="text" id="username" name="username">
	<br>
	<label>Password: </label><input type="password" id="password" name="password">
	<br>
	<input type="submit" value="Login">
</form>

<?php
	require('inc/footer.php');
?>