<?php

header("Access-Control-Allow-Origin  : *");
header("Access-Control-Allow-Methods : GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers : Origin, X-Requested-With , Content-Type , Accept");


define("DB_host","localhost");
define("DB_userName","root");
define("DB_password","infiniti");
define("DB_name","Blog");


function connect()
{

	$connect = mysqli_connect(DB_host,DB_userName,DB_password,DB_name);

	if(mysqli_connect_error($connect))
	{
		die("Failed to connect".mysqli_connect_error());
	}	

	mysqli_set_charset($connect,"utf8");

	return $connect;
}


$connection = connect();

?>