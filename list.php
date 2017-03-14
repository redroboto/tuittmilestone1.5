<?php

//variable 'list' taken from json 'items' json file
	$string = file_get_contents('json/items.json');
	$list = json_decode($string, true);

?>