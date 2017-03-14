<?php

session_start();


//set $key as the array key of the item clicked in previous page
$key = $_GET['key'];

//call JSON file for the array of list items
require_once('list.php');

//check if role is set and if the page is accessed by an admin
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
	if(isset($_POST['delete'])){

		//delete currently selected item from $list
		unset($list[$key]);

		//save in JSON file
		$fp = fopen('json/items.json', 'w');
		fwrite($fp, json_encode($list, JSON_PRETTY_PRINT));
		fclose($fp);
		//relocate after click
		header('location:user-page-ecommerce.php');

	}
	elseif(isset($_POST['cancel'])){

		//relocate back to user page
		header('location:user-page-ecommerce.php');
	}

	echo "<h2>Item Selected:</h2?";
	echo "<div class='item-selection col-md-4 text-center'>";
	echo "<h4>". $list[$key]['name']."</h4>";
	echo "<img class='item-img' src='".$list[$key]['image']."'>";
	echo "<p>Description:</p>";
	echo "<p>".$list[$key]['description']."</p>";
	echo "<p>Interests:</p>";
	echo "<p>".$list[$key]['interest1'].", ".$list[$key]['interest2'].", ".$list[$key]['interest3']."</p>";
	echo "<p> Intro Fee:<p>";
	echo "<p>".$list[$key]['fee']."</p>";
	echo "<form method='POST'>
		<input type='submit' name='delete' value='delete'>";
	echo "<input type='submit' name='cancel' value='cancel'>
		</form>";

}
else {
	echo "Please log in as admin  <a href='ecommerce.php'>here</a>";
}



?>