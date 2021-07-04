<?php 
	include 'connection.php';
 	include '../phpcrudfiles/addresscrud.php';
 	$address = new address($con);
 	$get_area = array();
 	if(isset($_POST['for']) && $_POST['for']=="agent")
 	{
 		$get_area = $address->getAreaList($_POST['district_id']);
 	}
 	if(isset($_POST['for']) && $_POST['for']=="donor")
 	{
 		$get_area = $address->avilableAreaList($_POST['district_id']);
 	}
 	

	

	foreach ($get_area as $key => $value) 
	{
?>
		<option value="<?php echo $value['area_id']; ?>"> <?php echo $value['area'];  ?></option>
<?php		
	}


 ?>