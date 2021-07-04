<?php
  include 'connection.php';
    include "../phpcrudfiles/galleryCrud.php";
    $gallery = new gallery($con);
   
    if(isset($_POST['action']) && $_POST['action']=="insert")
    {
      $gallery->insert_image($_POST);    
    }
    

    if(isset($_POST['action']) && $_POST['action']=="dlt")
    {
      $gallery->dlt_img($_POST['dltid']);
    }

    $sweetsmiles = $gallery->get_image();
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
       text-align: center;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
      }
      h1 {
        color: coral;
      }
      .grid-container {
          columns: 5 200px;
          column-gap: 1.5rem;
          width: 98%;
          border:2px solid black;
          padding: 10px;
          border-radius: 5px;
          margin: 1%;
      }
      .grid-container:hover{
          border-color: black;
      }
      .div {
        width: 150px;
        margin: 0 1.5rem 1.5rem 0;
        display: inline-block;
        width: 100%;
        border: solid 2px black;
        padding: 5px;
        box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
        border-radius: 5px;
        transition: all .25s ease-in-out;
      }
      #myImg:hover{
        filter: grayscale(100%);
      }
      .div:hover {
        border-color: coral;
        box-shadow: none;
      }
      p {
        margin: 5px 0;
        padding: 0;
        text-align: center;
        font-style: italic;
      }
      #myImg{
        cursor: pointer;
        width: 100%;
        filter: grayscale(0);
        border-radius: 5px;
        transition: all .25s ease-in-out;
      }
      .img01{
        align-self: center;
        width: 500px;
        height: 500px;
        margin-left: auto;
        margin-right: auto; 
         margin-top: 5vh;
        border-radius: 20px;
        border:2px inset black;
        box-shadow: 5px 5px 10px white,-5px -5px 10px white;
      }
      .modal{
        display: none;
        height: 100vh;
        width: 100%;
        margin: 0px;
        background-color: rgb(0, 0,0,.9);
        position: fixed;
        z-index:99999999999999999999;
      }
      input
      {
        width: 100%;
        padding: 10px;
        border:1px solid black;
      }
      @media screen and (max-width: 600px){
        .img01
        {
          width: 80%;
          height: 80%;
        }
      }
      #popupwindow
      {
        width: 50%;
        margin: 10px;
        margin-right: auto;
        margin-left: auto;
        display: none;

      }
    </style>
</head>
<body>
  <div class="modal" id="modal01" onclick="this.style.display='none'">
    <img id="img01" class="img01"> 
</div>
<div style="border-bottom: 2px solid black;margin-bottom: 10px;background-color: brown">
  <h1>Sweet Smiles<button class="btn btn-primary" id="openpopupbtn" style="float: right;margin-right: 20px;margin-top: 4px;">Add</button></h1>  
</div>

<div id="popupwindow">
  <form enctype="multipart/form-data" id="galleryform" onsubmit="return false">
      <input type="file" name="image" id="image">
      <input type="text" name="image_dis" id="image_dis">      
      <input type="submit" name="submit" id="submit" >
  </form>
</div>
      

<div class="grid-container">
  <?php 
    foreach($sweetsmiles as $key=>$value)
    {
  ?>
    <div class="div" >
      <span style="float: right;cursor: pointer;" onclick="dlt_data('gallery',<?php echo $value['image_id'];?>)">&times;</span>
      <img class='grid-item grid-item-1' id="myImg" src="<?php echo $value['image']; ?>" onclick="Click(this)">
      <p><?php echo $value['image_dis']; ?></p>
    </div>
  <?php
    }
  ?>

 
</div>



  <script>
    function Click(element){
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
    }
    $('#openpopupbtn').click(function(){
      $('#popupwindow').slideToggle();
    });
    function dlt_data(page,dltid)
    {
      $.ajax({
        url:page+".php",
        method:"post",
        data:{"action":"dlt","dltid":dltid},
        success:function(mydata)
        {
          $('#content').html(mydata);
        }
      });
    }
    
$(document).ready(function(){
    $("#submit").click(function(){
        var myform = document.getElementById('galleryform');
        var fd = new FormData(myform);
        var files = $('#image')[0].files[0];
        fd.append('image',files);
        fd.append('action','insert');
        if($('#image').val()!="" && $('#image_dis').val()!="")
        {
          $.ajax({
            url: 'gallery.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(responsedata){
                $('#content').html(responsedata);
            },
          });
        }
        else
        {
          alert("both Field are required");
        }
        
    });
});
  </script>
</div>

