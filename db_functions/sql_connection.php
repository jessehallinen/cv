<?php
require_once(dirname(__FILE__, 5) . '/php_includes/recipebank_include.php');

// Try to connect to the database.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// If connection error then stop the script and display the error.
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$con->set_charset("utf8");
?>