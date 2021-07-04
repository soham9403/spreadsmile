<?php 
class monthly_donor
{
	private $connection;
		function __construct($con)
		{
			$this->connection = $con;
		}

		function insert_info($data)
		{
			if (isset($data) && !empty($data)) 
			{
				$fullname =  $data['fullname'];
				$email =  $data['email'];
				$phone_no1 =  $data['phone_no1'];
				$phone_no2 =  $data['phone_no2'];
				$district_id =  $data['district_id'];
				$area_id =  1;//$data['area_id'];
				$landmark =  $data['landmark'];
				$food = "";
				if(isset($data['rice']))
				{
					$food.=",".$data['rice'];
				}
				if(isset($data['wheat']))
				{
					$food.=",".$data['wheat'];
				}
				if(isset($data['Beans']))
				{
					$food.=",".$data['Beans'];
				}

				if(isset($data['Fruit']))
				{
					$food.=",".$data['Fruit'];
				}
				if(isset($data['other']) && !empty($data['other']))
				{
					$food.=",".$data['other'];
				}

				$sql_insert = "INSERT INTO monthly_donor (fullname,email,phone_no1,phone_no2,district_id,area_id,landmark,food) VALUES ('$fullname','$email','$phone_no1','$phone_no2','$district_id','$area_id','$landmark','$food')";
				$insert = mysqli_query($this->connection, $sql_insert);

			}
		}


		function get_info()
		{
			$sql_select = "SELECT * FROM monthly_donor INNER JOIN district ON district.district_id=monthly_donor.district_id INNER JOIN area ON area.area_id=monthly_donor.area_id AND area.district_id=monthly_donor.district_id";
			$data = mysqli_query($this->connection,$sql_select);
			$donor = array();
			while ($row = mysqli_fetch_assoc($data)) 
			{
				$donor[] = $row;
			}	
			return $donor;

		}
}

 ?>