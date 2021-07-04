 var color;
 //-------------------------------------------------------------------------------------------// 
 //-------------------------------------------------------------------------------------------// 
 //on nav button mouse enter effect
 //-------------------------------------------------------------------------------------------// 
 //-------------------------------------------------------------------------------------------// 
  $('.listItem').on('mouseenter',function(){
    color = $(this).css('backgroundColor');
    $(this).css('backgroundColor','white').css('color','black');

    $('.listItem').eq($('#navpageVal').val()).css('backgroundColor','red');
  });
  // on nav buttons mouse leave effect
  $('.listItem').on('mouseleave',function(){
    $(this).css('backgroundColor',color).css('color','white');
    $('.listItem').eq($('#navpageVal').val()).css('backgroundColor','red');
  });
//-------------------------------------------------------------------------------------------// 
//-------------------------------------------------------------------------------------------// 
//open nav bar in obile view
//-------------------------------------------------------------------------------------------// 
//-------------------------------------------------------------------------------------------// 
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


