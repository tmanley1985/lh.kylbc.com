<?php
	class Admin extends Model{

		public function authenticate($user, $pass){
			$admin_user_pass = $this->get_tbl_data('Admin');

			$db_admin_data = array();

			foreach($admin_user_pass as $admin){
				//Loads the admin username and password into an array
				$db_admin_data['user'] = $admin['username'];
				$db_admin_data['pass'] = $admin['password'];

			}
			if($user == $db_admin_data['user'] && $pass == $db_admin_data['pass']){
				echo "Logged In as Admin";
			}elseif ($user != $db_admin_data['user']) {
				echo "Incorrect Username";
			}elseif($pass != $db_admin_data['pass']){
				echo "Password doesn't match";
			}else{
				echo "Something went wrong";
			}


			//Compare the POST data with the admin user/pass from the db
			//and if they are true, set a session id, make the logout link appear, make the admin forms appear
			//if they press the logout button, we'll unset the session id
			//and use the header function to return them to the index.php file
		}

	}
?>