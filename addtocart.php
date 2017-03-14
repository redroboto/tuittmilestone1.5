<?php

session_start();
$key = $_GET['key'];

$_SESSION['cart_items'][$key] = 1;

header('location: user-page-ecommerce.php');

?>