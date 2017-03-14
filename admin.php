<?php
	session_start();

	if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
		echo "Logged in as admin";

	}
	else {
		echo "This is a restricted page. You may log in <a href='login.php'>here</a>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>

</body>
</html>