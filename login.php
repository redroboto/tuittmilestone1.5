
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<style type="text/css">
		h4 {
			display: inline-block;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<h2>Login</h2>
	<form method="POST">
		<h4>Username:</h4>
		<input type="text" name="username"><br>
		<h4>Password:</h4>
		<input type="password" name="password"><br><br>
		<input class="btn btn-info" type="submit" name="login" value="login"><br>
	</form>

	<h2>Register</h2>
	<form method="POST">
		<h4>Username:</h4>
		<input type="text" name="new_username"><br>
		<h4>Password:</h4>
		<input type="password" name="new_password"><br>
		<h4>Confirm Password:</h4>
		<input type="password" name="confirm"><br><br>
		<input class="btn btn-info" type="submit" name="register" value="register">
	</form>



	<?php 

	// $users = [
	// 	['username' => 'vince',
	// 	'password' => 'password'],
	// 	['username' => 'hello',
	// 	'password' => 'world'],
	// 	['username' => 'newuser',
	// 	'password' => 'newuser']
	// ];

	//opens a writeable json file
	//$fp = fopen('json/users.json','w');
	//writes $users array into json file
	//fwrite ($fp, json_encode($users,JSON_PRETTY_PRINT));
	//closes function
	//fclose ($fp);

	// retrieve stored file from json in string
	$string = file_get_contents('json/users.json');
	// converts string back to array
	$users = json_decode($string, true);

	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$flag = 0;
		foreach($users as $user){
			if($username == $user['username']){
				$flag = 1;
				if($password == $user['password']){
					echo "Successful login!";
					session_start();
					$_SESSION['username'] = $user['username'];
					$_SESSION['role'] = $user['role'];
				}
				else{
					echo "Incorrect password";
				}
			}
		}
		if($flag == 0){
			echo "Username not found";
		}

	}

	if(isset($_POST['register'])){
		
		if($_POST['new_password'] == $_POST['confirm']) {
			$newuser = ['username' => $_POST['new_username'],
			'password' => sha1($_POST['new_password'])];
			$newuser['role'] = 'regular';
		
 
			$string = file_get_contents('json/users.json');
			$users = json_decode($string, true);

			array_push($users, $newuser);
			//shortcut for array_push
			// $users[] = $newuser

			$fp = fopen('json/users.json','w');
			fwrite ($fp, json_encode($users,JSON_PRETTY_PRINT));
			fclose ($fp);
			echo "Registration successful";
		}
		else{
			echo "Passwords do not match";
		}
	}


	?>
</body>
</html>
