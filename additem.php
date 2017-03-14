<?php

//adds new item into the array upon clicking add
if(isset($_POST['add'])){
	$string = file_get_contents("json/items.json");
	$items = json_decode($string, true);

	$new_item['name'] = $_POST['name'];
	$new_item['image'] = $_POST['image'];
	$new_item['description'] = $_POST['description'];
	$new_item['interest1'] = $_POST['interest1'];
	$new_item['interest2'] = $_POST['interest2'];
	$new_item['interest3'] = $_POST['interest3'];
	$new_item['fee'] = $_POST['fee'];

	$items[] = $new_item;

	$fp = fopen('json/items.json', 'w');
	fwrite($fp, json_encode($items, JSON_PRETTY_PRINT));
	fclose($fp);

	//returns user to user page after adding an item
	header("Location: user-page-ecommerce.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Item Page</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

<?php session_start(); if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){ ?>
	<h3>Add New Item</h3>
	<form class="form-horizontal" method='post'>
		<div class="form-group">
			<label class="col-xs-2" for="name">Name:</label>
			<input class="col-xs-4" type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="image">Image:</label>
			<input class="col-xs-4" type="text" class="form-control" name="image">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="description">Description:</label>
			<input class="col-xs-4" type="text" class="form-control" name="description">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="interest1">Interest 1:</label>
			<input class="col-xs-4" type="text" class="form-control" name="interest1">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="interest2">Interest 2:</label>
			<input class="col-xs-4" type="text" class="form-control" name="interest2">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="interest3">Interest 3:</label>
			<input class="col-xs-4" type="text" class="form-control" name="interest3">
		</div>
		<div class="form-group">
			<label class="col-xs-2" for="fee">Fee:</label>
			<input class="col-xs-4" type="text" class="form-control" name="fee">
		</div>
		<input type="submit" name="add" value="Add Item">
	</form>
<?php }else echo "Please log in as admin." ?>
</div>
</body>
</html>
