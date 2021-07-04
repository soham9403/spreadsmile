<?php 
	class agent_info
	{
		private $connection;
		function __construct($con)
		{
			$this->connection = $con;
		}
		function insert_info($data)
		{ 
			if(isset($data) && !empty($data))
			{	
				//form data
				$name = $data['name'];
				$username = $data['username'];
				$password = $data['password'];
				$email = $data['email'];
				$phone_no = $data['phone_no'];
				$district_id = $data['district_id'];
				$area_id = $data['area_id'];
				$landmark = $data['landmark'];
				//file uploading
				$image = $_FILES['agent_image'];
				
				$img_name = $image['name'];
				$img_name = str_replace(" ", "_", $img_name);
				$img_tmp_name = $image['tmp_name'];
				$agent_image = "../agent/".$img_name;

				if(move_uploaded_file($img_tmp_name, $agent_image))
				{
					$sql_insert = "INSERT INTO agent (name,username,password,email,phone_no,district_id,area_id,landmark,agent_image) VALUES ('$name','$username','$password','$email','$phone_no','$district_id','$area_id','$landmark','$agent_image')";	
					$insert = mysqli_query($this->connection,$sql_insert);
					if($insert)
					{
						$to = $email;
						$headers="From: spread smiles<sohampatel9403@gmail.com>\r\n";
						$headers.="MIME-Version: 1.0\r\n";
						$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
						$sub = "welcome";
						$msg = "<h1 style='color:red;font-size:20px;'>Congratulation</h1><p style='font-size:15px'>Now you are meber of Spread-Smile.Spread a smile with us and enjoy it</p>";
						mail($to,$sub,$msg,$headers);
					}
				}		
			}

		}
		//it will check username is exists or not
		function check_username($data)
		{
			$username = $data['username'];
			$sql_select = "SELECT * FROM agent WHERE username='$username'";
			$get_data = mysqli_query($this->connection,$sql_select);

			$get_username = array();
			while ($row = mysqli_fetch_assoc($get_data)) 
			{
				$get_username[] = $row;
			}
			return $get_username;
		}
		//at login page
		function agent_login($data)
		{
			if(isset($data) && !empty($data))
			{
				$username = $data['username'];
				$password = $data['password'];
				$get_data_of_user = $this->check_username($data);
				if(isset($get_data_of_user) && !empty($get_data_of_user))
				{
					if($get_data_of_user[0]['password']==$password)
					{
						setcookie('login_id',$username,time()+3600*24*365*10);
						echo "success";
					}
					else 
					{
						echo "password is wrong";
					}
				}
				else
				{
					echo "user name is wrong";
				}
				
			}
		}
		//at agent info page
		function get_agent_info()
		{
			$sql_select = "SELECT * FROM agent INNER JOIN district ON district.district_id=agent.district_id INNER JOIN area ON area.area_id=agent.area_id";
			$get_data = mysqli_query($this->connection,$sql_select);

			$get_info = array();
			while ($row = mysqli_fetch_assoc($get_data)) 
			{
				$get_info[] = $row;
			}
			return $get_info;
		}
		//it will be used to mail nearest agents
		function mail_agent($data)
		{
			$fullname = $data['fullname'];
			$phone_no = $data['phone_no'];
			$district_id=$data['district_id'];
			$area_id = $data['area_id'];
			$landmark = $data['landmark'];
			$person_count = $data['person_count'];

			$sub = "collecting donation";
			$msg = "<h3>there is donor in your area</h3><br><p>go to web site and accept donation</p><br><a href='http:/\/localhost/spreadsmile/user/donor.php'>spread smile</a>,.
			<ul>
				<li> <span style='font-size: 20px'> Donor : </span><span style='font-size: 15px'>".$fullname."</span></li>
				<li> <span style='font-size: 20px'> phone_no : </span><span style='font-size: 15px'>".$phone_no."</span></li>
				<li> <span style='font-size: 20px'> landmark : </span><span style='font-size: 15px'>".$landmark."</span></li>
				<li> <span style='font-size: 20px'> person_count : </span><span style='font-size: 15px'>".$person_count."</span></li>

			</ul>";
			$headers="From: spread smiles<sohampatel9403@gmail.com>\r\n";
			$headers.="MIME-Version: 1.0\r\n";
			$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
			

			$sql_select = "SELECT email FROM agent WHERE district_id='$district_id' AND area_id='$area_id'";
			$get_data = mysqli_query($this->connection,$sql_select);
			$get_info = array();
			while ($row = mysqli_fetch_assoc($get_data)) 
			{
				$get_info[] = $row;
			}

			foreach ($get_info as $key => $value) 
			{
				$to = $value['email'];
				mail($to,$sub,$msg,$headers);
			}
		}
	}



 ?>