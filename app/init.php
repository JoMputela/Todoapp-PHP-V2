<?php

session_start();

$_SESSION[ 'user_id'] = 1;

$db = new PDO('mysql:dbname=todo;host=localhost', 'root', 'root');

//handling/checking//

if (!isset($_SESSION['user_id'])) {
	die('you are not singed in.');
}



?>