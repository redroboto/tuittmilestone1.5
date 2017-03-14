<?php

session_start();

//set $key as the array key of the item clicked in previous page
$key = $_GET['key'];

//call JSON file for the array of list items
require_once('list.php');

//check if role is set and if the page is accessed by an admin
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
	//clicking save button captures the data input in the form fields
	if(isset($_POST['save'])){

		$new_item['name'] = $_POST['name'];
		$new_item['image'] = $_POST['image'];
		$new_item['description'] = $_POST['description'];
		$new_item['interest1'] = $_POST['interest1'];
		$new_item['interest2'] = $_POST['interest2'];
		$new_item['interest3'] = $_POST['interest3'];
		$new_item['fee'] = $_POST['fee'];

		//to replace the array in $list with specified key
		$list[$key] = $new_item;

		//save in JSON file
		$fp = fopen('json/items.json', 'w');
		fwrite($fp, json_encode($list, JSON_PRETTY_PRINT));
		fclose($fp);
		//relocate after click
		header('location:user-page-ecommerce.php');
	}

	//create form field to capture the new data
	echo '
		<h3>Edit Item</h3>
		<form class="form-horizontal" method="post">
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
			<input type="submit" name="save" value="save">
		</form>
		';
}
else {
	echo "Please log in as admin  <a href='ecommerce.php'>here</a>";
}


?>