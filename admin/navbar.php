<link rel="stylesheet" type="text/css" href="../css/navbar.css">

<nav class="container-fluid" id="navbar"> 
  <ul type="none" class="nav_menu row">
    <div class="navlist">
      <a style="border-right: 2px solid white;border-radius: 0px;margin-right: 5px;" id="logoof"><img src="../images/preloader.png" height="90px" width="90px" style="margin-top: -20px;border-radius: 100px;"></a>
      <a onclick="openPage(1)" class="listItem"><li>Current donation</li></a> 
      <a onclick="openPage(2)" class="listItem"><li>completed donation</li></a> 
      <a onclick="openPage(3)" class="listItem"><li>monthly Donors</li></a>  
      <a onclick="openPage(4)" class="listItem"><li>Agent details</li></a>
      <a onclick="openPage(5)" class="listItem"><li>Feedback</li></a>
      <a onclick="openPage(6)" class="listItem"><li>gallery</li></a> 
      <input type="hidden" id="navpageVal">
      <input type="hidden" id="togglecontroller">
    </div>
    <div class="navmenuicon">
      <div><i class="fas fa-bars" id="menubtn"></i></div>
    </div>   
  </ul> 
</nav>

<script type="text/javascript">
  $('.navmenuicon').click(function(){
      if($('.navlist').first().css('width')=="300px")
      {
        $('.navlist').fadeToggle("slow").css('width','0px');
        $('.navmenuicon').css('transform','rotateZ(0deg)');
        $('.navmenuicon').css('margin','0 0 0 0px');
        $('#menubtn').removeAttr('class');
        $('#menubtn').attr('class','fas fa-bars');

      }
      else
      {
        $('.navmenuicon').css('margin','0 0 0 300px');
        $('.navmenuicon').css('transform','rotateZ(360deg)');
        $('.navlist').fadeToggle().css('width','300px');
        $('#menubtn').removeAttr('class');
        $('#menubtn').attr('class','fa fa-close');
        
      }
  });


function openPage(pageid)
{

  var page;
  $('.listItem').css('backgroundColor','#333').css('color','white');
  $('#navpageVal').val(pageid-1);
  $('.listItem').eq(pageid-1).css('backgroundColor','red').css('color','white');
  $('#togglecontroller').val("");
  switch(pageid)
  {
    case 1 : page = "currentdonation";
    break;
    case 2 : page = "completeddonation";
    break;
    case 3 : page = "membership";
    break;
    case 4 : page = "agentdetails";
    break;
    case 5 : page = "feedback";
    break;
    case 6 : page = "gallery";
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
