<?php

session_start();

//set $key as the array key of the item clicked in previous page
$key = $_GET['key'];

//call JSON file for the array of list items
require_once('list.php');

//delete currently selected item from $list
unset($_SESSION['cart_items'][$key]);

//relocate back to user page
header('location: item-cart.php');

?>