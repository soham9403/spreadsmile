<?php 
include 'connection.php';
include '../phpcrudfiles/donorcrud.php';
$donor_info = new donor($con);
//--------------------------------------------------------------------------------------------------------------------//
//getting logged in agent's info
	$agent_info = array();
	if(isset($_COOKIE['login_id']))
	{
		$username = $_COOKIE['login_id'];
		$pass = ["username"=>$username];

		$agent =  new agent_info($con);
		$agent_info = $agent->check_username($pass);
	}

//---------------------------------------------------------------------------------------------------------------------//
//updating status
	if(isset($_POST['action']) && $_POST['action']=="update_accepted_status")
	{
		$donor_info->update_status('accepted_status',$_POST['agent_id'],$_POST['donor_id']);
	}
	else if(isset($_POST['action']) && $_POST['action']=="update_recieved_status")
	{
		$donor_info->update_status('recieved_status',$_POST['agent_id'],$_POST['donor_id']);
	}
//---------------------------------------------------------------------------------------------------------------------//	
//getting list of donors
	$district_id = $agent_info[0]['district_id'];
	$area_id = $agent_info[0]['area_id'];
	$agent_id = $agent_info[0]['agent_id'];

	$get_current_donor_info = $donor_info->get_current_donor_info('agent',$district_id,$area_id,$agent_id);

//----------------------------------------------------------------------------------------------------------------------//
//log out function
if(isset($_POST['action']) && $_POST['action']=="log_out")
{
	setcookie('login_id',"", time() - 3600);
}


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
	.agentnav
	{
		background-color: brown;
		width: 100%;
		margin: 0px;
		padding: 5px;
	}
	.agent_name_box
	{
		display: inline-block;
		height: 100%;
		padding: 15px;
		font-size: 20px;
		color: white;
		vertical-align:top;
	}
	#logout_btn
	{
		float: right;
		margin: 5px;
	}
	#current_donor_list_container
	{
		height: 80vh;
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
		height: 80vh;
		width: 100%;
		margin: 0px;
		padding:30vh 18%;
		font-size: 4vw;
		color: white;
		position: fixed;
	}
</style>
<div class="agentnav">
	<img height="60" width="60" style="margin: 2px;border-radius: 100px;" src="<?php echo $agent_info[0]['agent_image'] ?>" >
	<div class="agent_name_box"><?php echo $agent_info[0]['name'] ?></div>
	<div id="logout_btn">
		<button id="log_out" class="btn btn-primary">log out</button>
	</div>
</div>

<div id="current_donor_list_container">
	<?php 
		if(isset($get_current_donor_info) && !empty($get_current_donor_info))
		{
			foreach ($get_current_donor_info as $key => $value) 
			{		
	?>
				<div class="donor_list">
					<div class="donor_list_header">
						<span class="donor_list_title"><?php echo $value['fullname']; ?></span>
						<?php 
							if($value['accepted_status']=="0")
							{
						?>
								<img src="../images/red_light.png" height="50" width="50" class="signals">
						<?php		
							}
							else
							{
						?>
								<img src="../images/green_light.png"  height="50" width="50" class="signals">
						<?php		
							}

							if($value['recieved_status']=="0")
							{
						?>
								<img src="../images/red_light.png" height="50" width="50" class="signals">
						<?php		
							}
							else
							{
						?>
								<img src="../images/green_light.png"  height="50" width="50" class="signals">
						<?php		
							}
						 ?>
						 <?php 
							if($value['accepted_status']=="0")
							{
						?>
								<button class="btn btn-primary operations" onclick="accept_recieve_opertaions('accept',<?php echo $agent_info[0]['agent_id'] ?>,<?php echo $value['donor_id']; ?>)">accept</button>
						<?php		
							}
							else
							{
						?>
								<button class="btn btn-primary operations" onclick="accept_recieve_opertaions('recieve',<?php echo $agent_info[0]['agent_id'] ?>,<?php echo $value['donor_id']; ?>)">recieved</button>
						<?php
							}
						?>		
					</div>

					<div class="donor_list_body">
							<span class="title">Phone no: </span>
							<span class="info"><a href="tel:<?php echo $value['phone_no']; ?>"><?php echo $value['phone_no']; ?></a></span>
						<hr>
							<span class="title">location: </span>
							<span class="info"><?php echo $value['landmark']; ?></span>
						<hr>
							<span class="title">person count :</span>
							<span class="info"><?php echo $value['person_count']; ?></span>
					</div>
				</div>
	<?php
			}
		}
		else
		{
	?>
			<div class="not_found">
				No Donation is found in your area
			</div>
	<?php
		}
	 ?>	
</div>




<script type="text/javascript">
	$('#log_out').click(function(){
		$('.loader').fadeToggle();
		$.ajax({
			url:"agentpage.php",
			method:"post",
			data:{"action":"log_out"},
			success:function(data)
			{
				$('.loader').fadeToggle();
				window.location.replace('http://localhost/spreadsmile/user/spreadsmile.php');	
			}
		});	 
	});

	function accept_recieve_opertaions(type,agentid,donorid)
	{
		clearInterval(get_refresh);
		var action;
		if(type=="accept")
		{
			action="update_accepted_status";
		}
		else if(type=="recieve")
		{
			action="update_recieved_status";
		}
		var top = $('#current_donor_list_container').scrollTop();
		$('.loader').fadeToggle();
		$.ajax({
			url:"agentpage.php",
			method:"post",
			data:{"action":action,"agent_id":agentid,"donor_id":donorid},
			success:function(mydata)
			{
				$('.loader').fadeToggle();
				$('#content').html(mydata);
				
				$('#current_donor_list_container').scrollTop(top);
			}
		});
	}
	
		var get_refresh = setInterval(get_refresh,10000);
	
	
	 function get_refresh()
	 {
	 	var top = $('#current_donor_list_container').scrollTop();
	 	clearInterval(get_refresh);
	 	if($('#navpageVal').val()==5)
		{
		 	$.ajax({
				url:"agentpage.php",
				method:"post",
				success:function(mydata)
				{
					$('#content').html(mydata);
					$('#current_donor_list_container').scrollTop(top);
				}
			});
		}
	 }

	 
</script>