<?php 
include 'connection.php';	
include '../phpcrudfiles/agentcrud.php';
$username = array();
$agent = new agent_info($con);
if(isset($_POST['action']) && $_POST['action']=="check")
{
	$username = $agent->check_username($_POST);	
}

if (empty($username)) {
	echo "username is valid";
}
else
{
	echo "username is already exists";
}


 ?>
