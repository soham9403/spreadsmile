<?php 
include 'connection.php';
include '../phpcrudfiles/monthly_donorcrud.php';
$monthly_donor = new monthly_donor($con);
$get_current_donor_info = $monthly_donor->get_info();
?>
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}
	::-webkit-scrollbar 
	{
	  display: none;
	}
	#completed_donor_list_container
	{
		height: 90vh;
		padding: 5px;
		overflow-y: scroll;
		background-color: grey;
	}
	.donor_list
	{
		width: 90%;
		margin-left: auto;
		margin-right: auto;
		margin-top: 10px;
		margin-bottom: 10px;
		border:2px solid brown;
		border-radius: 3px;
	}
	.donor_list_header
	{
		width: 100%;
		padding: 10px;
		background-color: brown;
		border-top-right-radius: 3px;
		border-top-left-radius: 3px;
		height: 70px;
		cursor: pointer;
	}
	.donor_list_title
	{
		display: inline-block;
		height: 100%;
		padding: 10px;
		font-size: 20px;
		color: white;
		vertical-align:top;
	}
	.signals,.operations
	{
		float: right;
		margin: 5px;
	}
	.donor_list_body
	{
		width: 100%;
		padding: 10px;
		background-color: #ffffd7;
		border-bottom-right-radius: 3px;
		border-bottom-left-radius: 3px;
		display: none;
	}
	.donor_list_body .title
	{
		font-size: 20px;
		font-weight: bolder;
	}
	.donor_list_body .info
	{
		font-size: 15px;
		overflow-wrap: break-word;
	}
	a:hover
	{
		text-decoration: none;
	}
	.not_found
	{
		height: 90vh;
		width: 100%;
		margin: 0px;
		padding:30vh 18%;
		font-size: 4vw;
		color: white;
		position: fixed;
	}
</style>


<div id="completed_donor_list_container">
	<?php 
		if(isset($get_current_donor_info) && !empty($get_current_donor_info))
		{
			foreach ($get_current_donor_info as $key => $value) 
			{		
	?>
				<div class="donor_list">
					<div class="donor_list_header" onclick="openBody(<?php echo $key ?>)">
						<span class="donor_list_title"><?php echo $value['fullname']; ?></span>
							
					</div>

					<div class="donor_list_body">
						<span class="title">Email: </span>
							<span class="info"><a href="mailto:<?php echo $value['email']; ?>"><?php echo $value['email']; ?></a></span>
						<hr>
							<span class="title">Phone no 1: </span>
							<span class="info"><a href="tel:<?php echo $value['phone_no1']; ?>"><?php echo $value['phone_no1']; ?></a></span>
						<hr>
							<span class="title">Phone no 2: </span>
							<span class="info"><a href="tel:<?php echo $value['phone_no2']; ?>"><?php echo $value['phone_no2']; ?></a></span>
						<hr>
							<span class="title">location: </span>
							<span class="info"><?php echo $value['landmark']." , ".$value['area']." , ".$value['district']; ?></span>
						<hr>
							<span class="title">Items :</span>
							<span class="info"><?php echo $value['food']; ?></span>
						

					</div>
				</div>
	<?php
			}
		}
		else
		{
	?>
			<div class="not_found">
				No Donation is found now
			</div>
	<?php
		}
	 ?>	
</div>
<script type="text/javascript">

	 function openBody(id)
	 {
	 	$('#togglecontroller').val(id);
	 	var len = $('.donor_list_body').length;
	 	for(var i=0;i<len;i++)
	 	{
	 		if(i!=id)
	 		{
	 			$('.donor_list_body').eq(i).slideUp();
	 		}
	 	}
	 	
	 	$('.donor_list_body').eq(id).slideToggle();

	 }
</script>

