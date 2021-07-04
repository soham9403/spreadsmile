<?php 
	
	class feedback 
	{
		private $connection;
		function __construct($con)
		{
			$this->connection = $con;
		}
		function insert_feedback($data)
		{
			$name=$feedback_star=$feedback_msg=$feedback_sugg="";
				
			if(isset($data) && !empty($data))
			{
				if(isset($data['name']) && $data['name']!="")
				{
					$name = $data['name'];
				}
				if(isset($data['feedback_star']) && $data['feedback_star']!="")
				{
					$feedback_star = $data['feedback_star'];
				}
				if(isset($data['feedback_msg']) && $data['feedback_msg']!="")
				{
					$feedback_msg = $data['feedback_msg'];
				}	
				if(isset($data['feedback_sugg']) && $data['feedback_sugg']!="")
				{
					$feedback_sugg = $data['feedback_sugg'];
				}
				if($feedback_msg!="" && $feedback_star!="" && $name!="")
				{
					$sql_insert = "INSERT INTO feedback (name,feedback_star,feedback_msg,feedback_sugg) VALUES ('$name','$feedback_star','$feedback_msg','$feedback_sugg')";
					mysqli_query($this->connection,$sql_insert);
				}
			}	
		}

		function get_feedback()
		{
			$sql_select = "SELECT * FROM feedback";
			$get_feedback = mysqli_query($this->connection,$sql_select);
			$feedback = array();
			while($temp = mysqli_fetch_assoc($get_feedback))
			{
				$feedback[] = $temp;
			}
			return $feedback;
		}

		function dlt_feedback($id)
		{
			$sql_dlt = "DELETE FROM feedback WHERE feedback_id='$id'";
			mysqli_query($this->connection,$sql_dlt);
		}
	}
 ?>