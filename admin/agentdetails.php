<?php
include 'connection.php';	
include '../phpcrudfiles/agentcrud.php';
$agent_info = array();
$agent = new agent_info($con);

$agent_info = $agent->get_agent_info();

?>
	<style type="text/css">
		*
		{
			margin:0px;
			padding: 0px;
			box-sizing: border-box;
			word-wrap: break-word;
		}
		.agent_container
		{
			width: 90%;
			margin-bottom: 10px;
			margin-bottom: 10px;
			margin-left: auto;
			margin-right: auto;
			border-radius: 10px;
			padding: 0px;
		}
		.agent_head
		{
			width: 100%;
			background-color: brown;
			border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px;
		}
		.agent_head img
		{
			height: 50px;
			width: 50px;
			border-radius: 10000px;
		}
		.agent_body
		{
			width: 100%;
			background-color: #ffffd7;
			border:2px solid brown;
			border-top:0px;
			border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 20px;
		}
		.agent_body .title
		{
			
			display: inline-block;
			padding: 5px;
		}
		.agent_body .content
		{
			
			display: inline-block;
			padding: 5px;
			word-wrap: break-word;
		}
	</style>

		<?php 
		foreach ($agent_info as $key => $value) {
		?>
			<div class="agent_container">
				<div class="agent_head">
					<span  title="<?php echo $value['username']; ?>" >
						<img src="<?php echo $value['agent_image']; ?>">
					</span>
				</div>
				<div class="agent_body">
					<h3 class="title">name : </h3><p class="content"><?php echo $value['name'];  ?></p>
					<hr>
					<h3 class="title">Email : </h3><p class="content"><a href="mailto:<?php echo $value['email'];  ?>"><?php echo $value['email'];  ?></a></p>
					<hr>
					<h3 class="title">phone no : </h3><p class="content"><a href="tel:<?php echo $value['phone_no'];  ?>"><?php echo $value['phone_no'];  ?></a></p>
					<hr>
					<h3 class="title">City : </h3><p class="content"><?php echo $value['district'];  ?></p>
					<hr>
					<h3 class="title">Area : </h3><p class="content"><?php echo $value['area'];  ?></p>

				</div>
			</div>
		<?php 

		}
		?>
