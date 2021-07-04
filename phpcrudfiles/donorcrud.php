<?php
	include 'agentcrud.php'; 
	class donor
	{
		private $connection;
		function __construct($con)
		{
			$this->connection = $con;
		}

		function insert_info($data,$con)
		{
			if(isset($data) && !empty($data))
			{
				$fullname = $data['fullname'];
				$email = $data['email'];
				$phone_no = $data['phone_no'];
				$district_id=$data['district_id'];
				$area_id = $data['area_id'];
				$landmark = $data['landmark'];
				$person_count = $data['person_count'];

				$sql_insert = "INSERT INTO donor (fullname,email,phone_no,district_id,area_id,landmark,person_count) VALUES ('$fullname','$email','$phone_no','$district_id','$area_id','$landmark','$person_count')";
				
				$insert = mysqli_query($this->connection,$sql_insert);

				if($insert)
				{
					$to = $email;
					$sub = "Thanking for donation";
					$msg = "<h3>".$fullname."</h3>,Thank you for donating food instead of wasting it.\n<br> we will surely donate this food to needy .\n<br> we will mail you soon the information of our agent who will recieve it.";
					$headers="From: spread smiles<sohampatel9403@gmail.com>\r\n";
					$headers.="MIME-Version: 1.0\r\n";
					$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
					//mailing to donor.
					mail($to,$sub,$msg,$headers);
					//mailing to nearest agents
					$agent = new agent_info($con);
					$agent->mail_agent($data);
				}
				else
				{
					echo "not inserted";
				}
			}
		}
		function get_current_donor_info($preson,$district_id=1,$area_id=1,$agent_id=1)
		{
			if($preson=="admin")
			{
				$sql_select = "SELECT * FROM donor LEFT JOIN agent ON donor.agent_id=agent.agent_id INNER JOIN district ON district.district_id=donor.district_id INNER JOIN area ON area.area_id=donor.area_id AND area.district_id=donor.district_id WHERE donor.recieved_status='0'";
				$get_data = mysqli_query($this->connection,$sql_select);
				$donor = array();
				while ($row = mysqli_fetch_assoc($get_data)) 
				{
					$donor[] = $row;
				}	
			}
			elseif ($preson=="agent")
			{
				$sql_select = "SELECT * FROM donor WHERE recieved_status='0' AND district_id='$district_id' AND area_id='$area_id' AND (agent_id IS NULL OR agent_id='$agent_id')";
				$get_data = mysqli_query($this->connection,$sql_select);
				$donor = array();
				while ($row = mysqli_fetch_assoc($get_data)) 
				{
					$donor[] = $row;
				}	
			}
			
			return $donor;				
		}

		function get_completed_donor_info()
		{
			 $sql_select = "SELECT * FROM donor LEFT JOIN agent ON donor.agent_id=agent.agent_id INNER JOIN district ON district.district_id=donor.district_id INNER JOIN area ON area.area_id=donor.area_id AND area.district_id=donor.district_id WHERE donor.recieved_status='1' ORDER BY donation_date DESC";
			$get_data = mysqli_query($this->connection,$sql_select);
			$donor = array();
			while ($row = mysqli_fetch_assoc($get_data)) 
			{
				$donor[] = $row;
			}	
			return $donor;
		}
		function update_status($action_type,$agent_id,$donor_id)
		{

					$sub = "Food donation";
					$headers="From: spread smiles<sohampatel9403@gmail.com>\r\n";
					$headers.="MIME-Version: 1.0\r\n";
					$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
			if($action_type=="accepted_status")
			{
				$sql_update = "UPDATE donor SET accepted_status='1',agent_id='$agent_id' WHERE donor_id='$donor_id'";
				$update = mysqli_query($this->connection,$sql_update);
				if($update)
				{
					$sql_select = "SELECT * FROM agent WHERE agent_id='$agent_id'";
					$get_agent_info = mysqli_query($this->connection,$sql_select);
					$agent_info = array();
					while ($row = mysqli_fetch_assoc($get_agent_info)) 
					{
						$agent_info[] = $row;
					}

					$sql_donor_select = "SELECT * FROM donor WHERE donor_id='$donor_id'";
					$get_donor_info = mysqli_query($this->connection,$sql_donor_select);
					$donor_info = array();
					while ($row = mysqli_fetch_assoc($get_donor_info)) 
					{
						$donor_info[] = $row;
					}

					$to = $donor_info[0]['email'];
					$msg = "<span style='font-size:20px;'>Your donation is accepted By our agent.we r providing you agent's details who will recieve it</span>
						<div style='width: 90%;margin-left: auto;margin-right: auto;border:2px solid brown;border-radius: 3px;padding: 0px;box-sizing: border-box;'>
						 	<div style='width: 100%;margin: 0px;border-top-right-radius: 3px;border-top-left-radius: 3px;background-color: brown;color: white;font-size: 20px;padding: 10px;box-sizing: border-box;'>
						 		Agent Details
						 	</div>
						 	<div style='width: 100%;margin: 0px;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;background-color: #ffffd7;'>
						 		<span>Name : </span><span>".$agent_info[0]['name']."</span>
						 		<hr>
						 		<span>mobile no: </span><span>".$agent_info[0]['phone_no']."</span>
						 	</div>
						 </div>";
					mail($to, $sub, $msg,$headers);
				}
			}
			if($action_type=="recieved_status")
			{
				$sql_update = "UPDATE donor SET recieved_status='1' WHERE donor_id='$donor_id'";
				$update = mysqli_query($this->connection,$sql_update);
			}
		}

	}
 ?>
