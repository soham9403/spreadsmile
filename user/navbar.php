<link rel="stylesheet" type="text/css" href="../css/navbar.css">


<nav class="container-fluid" id="navbar"> 
  <ul type="none" class="nav_menu row" style="height: 60px;">
    <div class="navlist">
      <a style="border-right: 2px solid white;border-radius: 0px;margin-right: 5px;" id="logoof"><img src="../images/preloader.png" height="90px" width="90px" style="margin-top: -20px;border-radius: 100px;"></a>
      <a onclick="openPage(1)" class="listItem"><li><i class="fas fa-home"></i> Home</li></a> 
      <a onclick="openPage(2)" class="listItem"><li>Donor</li></a> 
      <a onclick="openPage(3)" class="listItem"><li>Membership</li></a>  
      <a onclick="openPage(4)" class="listItem"><li>Contact Us☎</li></a>
      <a onclick="openPage(5)" class="listItem"><li>sweet smiles😇</li></a>
      <a onclick="openPage(6)" class="listItem"><li> <?php if(isset($_COOKIE['login_id'])){echo "agent";}else{echo "login";} ?></li> </a>
     <a onclick="openPage(7)" class="listItem"><li>About Us</li></a>
      <input type="hidden" id="navpageVal">
    </div>
    <div class="navmenuicon">
      <div ><i class="fas fa-bars" id="menubtn"></i></div>
    </div>   
  </ul> 
</nav>




 <!-- navbar js -->
 <script type="text/javascript" src="../javascript/navbar.js"></script>
<script type="text/javascript">

 //-------------------------------------------------------------------------------------------// 
//-------------------------------------------------------------------------------------------// 
//opening pages on click of nav button
//-------------------------------------------------------------------------------------------// 
//-------------------------------------------------------------------------------------------// 
function openPage(pageid)
{

  var page;
  $('.listItem').css('backgroundColor','#333').css('color','white');
  $('#navpageVal').val(pageid-1);
  $('.listItem').eq(pageid-1).css('backgroundColor','red').css('color','white');
  switch(pageid)
  {
    case 1 : page = "homepage";
    break;
    case 2 : page = "donor";
    break;
    case 3 : page = "membership";
    break;
    case 4 : page = "contactus";
    break;
    case 5 : page = "gallery";
    break;
    case 6 : page = "<?php if(isset($_COOKIE['login_id'])){echo 'agentpage';}else{echo 'login';} ?>";
    break;
    case 7 : page = "aboutus";
    break;
  }
    
    $('#content').css('transform','rotateY(90deg)');
    $('#content').css('opacity','0');

    setTimeout(function(){
      $.ajax({
        url:page+".php",
        method:"post",
        
        success:function(mydata)
        {       
            $('#content').html(mydata);       
        }
      }); 
      $('#content').css('transform','rotateY(0deg)');
      $('#content').css('opacity','1');
      $(document).scrollTop(0);
    },1000);
      
} 

</script>