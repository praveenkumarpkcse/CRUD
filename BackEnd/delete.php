<?php 

require "database.php";

$id = ($_GET['id']!== NULL)? mysqli_escape_string($connection,(int)$_GET['id']):false;


if(!$id)
{
	http_response_code(400);
}

$query = "DELETE FROM `emp_details` WHERE `id` = {$id}";


if(mysqli_query($connection,$query))
{
	http_response_code(201);
	$status = 'Y';
	echo json_encode($status);
}else
{
	http_response_code(422);
}
?>