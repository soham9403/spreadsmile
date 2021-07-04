<?php 
	class address
	{
		private $connection;
		function __construct($con)
		{
			$this->connection = $con;
		}
		function getDistrictList()
		{
			$sql_select = "SELECT * FROM district";
			$get_district_list_obj = mysqli_query($this->connection,$sql_select);

			$district_list = array();

			while($row = mysqli_fetch_assoc($get_district_list_obj))
			{
				$district_list[] = $row; 
			}
			return $district_list;
		}
		function getAreaList($data)
		{
			$get_area = array();

			if(isset($data))
			{
				$district_ids = $data;		
				$sql_select = "SELECT * FROM area WHERE district_id='$district_ids'";
				$get_area_obj = mysqli_query($this->connection,$sql_select);

				while($row = mysqli_fetch_assoc($get_area_obj))
				{
					$get_area[] = $row; 
				} 		
			}
			return $get_area;
		}

		function avialableDistrictList()
		{
			$sql_select = "SELECT district.district,district.district_id FROM district INNER JOIN agent ON agent.district_id=district.district_id GROUP BY(district.district_id)";
			$get_district_list_obj = mysqli_query($this->connection,$sql_select);

			$district_list = array();

			while($row = mysqli_fetch_assoc($get_district_list_obj))
			{
				$district_list[] = $row; 
			}
			return $district_list;
		}

		function avilableAreaList($data)
		{
			$get_area = array();

			if(isset($data))
			{
				$district_ids = $data;		
				$sql_select = "SELECT area.area,area.area_id FROM area INNER JOIN agent ON agent.area_id=area.area_id WHERE area.district_id='$district_ids' GROUP BY area.area_id";
				$get_area_obj = mysqli_query($this->connection,$sql_select);

				while($row = mysqli_fetch_assoc($get_area_obj))
				{
					$get_area[] = $row; 
				} 		
			}
			
			return $get_area;	
		}
	}

	$con = mysqli_connect("localhost","root","","spreadsmile");
	$add = new address($con);
	$add->avialableDistrictList();
 ?>