<?php

require 'database.php';

$postData = file_get_contents('php://input');

if(isset($postData) && !empty($postData))
{
	$request = json_decode($postData);

	$inputName      = mysqli_real_escape_string($connection , $request->Empname);
	$inputJobTitle  = mysqli_real_escape_string($connection , $request->EmpJob);
	$inputExp       = mysqli_real_escape_string($connection , $request->EmpExp);
	

	$query = "INSERT into `emp_details`(`EmpName`,`EmpJob`,`EmpExp`) VALUES ('{$inputName}','{$inputJobTitle}','{$inputExp}')";

	if(mysqli_query($connection,$query))
	{
		http_response_code(201);
		$status = 'Y';
		echo json_encode($status);
	}else
	{
		http_response_code(422);
	}
} 

?>