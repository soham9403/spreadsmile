<?php
    class gallery{
        private $connection;
        function __construct($con)
        {
            $this->connection = $con;
        }    
        function insert_image($data)
        {
            if(isset($data) && !empty($data) && !empty($_FILES))
            {
                if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($data['image_dis']))
                {
                    $img = $_FILES['image'];
                    $image_dis = $data['image_dis'];
                    $tmp_name = $img['tmp_name'];
                    $name = $img['name'];
                    $date = date('l js\of F Y h:i:s A');   
                    // $name = date("l js\of F Y h:i:s A").$name;
                   // $name = str_replace(".","$date.",$name);
                    $name = str_replace(" ","_",$name);

                    $path = "../sweetsmile/".$name;

                    if(move_uploaded_file($tmp_name,$path))
                    {
                        $sql_insert = "INSERT INTO gallery (image,image_dis) VALUES ('$path','$image_dis')";
                        mysqli_query($this->connection,$sql_insert);
                    }
                    else
                    {
                        echo "cant upload";
                    }
                } 
            }
        }

        function get_image()
        {
            $sql_select =  "SELECT * FROM gallery";
            $get_images = mysqli_query($this->connection,$sql_select);
            $images = array();
            while($row = mysqli_fetch_assoc($get_images))
            {
                $images[] = $row;
            }
            return $images;
        }
        function dlt_img($id)
        {
            $sql_dlt = "DELETE FROM gallery WHERE image_id='$id'";
            mysqli_query($this->connection,$sql_dlt);
        }
    }
?>