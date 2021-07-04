<?php
  include 'connection.php';
    include "../phpcrudfiles/galleryCrud.php";
    $gallery = new gallery($con);
    $sweetsmiles = $gallery->get_image();
?>


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
        color: white;
        padding: 10px;
        width: 100%;
        background-color: brown;
      }
      .grid-container {
          columns: 5 200px;
          column-gap: 1.5rem;
          width: 98%;
          border:2px solid black;
          background-color: white;
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
      
      input
      {
        width: 100%;
        padding: 10px;
        border:1px solid black;
      }
      
    </style>

  
<h1>Sweet Smiles</h1>

<div class="grid-container">
  <?php 
    foreach($sweetsmiles as $key=>$value)
    {
  ?>
    <div class="div" >
      <img class='grid-item grid-item-1' id="myImg" src="<?php echo $value['image']; ?>" onclick="Click(this)">
      <p><?php echo $value['image_dis']; ?></p>
    </div>
  <?php
    }
  ?>

  

  <script>
    function Click(element)
    {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
    }
  </script>
</div>

