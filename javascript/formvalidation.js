function validation(id,borderafter="2px solid red",borderbefore="2px solid rgb(0,255,0)",errmsg="is required") 
{
    if($("#"+id).val()=="")
    {

      $("#"+id).css('border',borderafter);
      var name = $("#"+id).attr('fieldname');
      $("#"+id+"err").html(name + " " +errmsg);
      $("#"+id+"err").css('display','inline-block');
      
    }
    else
    {
       $("#"+id).css('border',borderbefore);
       $("#"+id+"err").html("");
      $("#"+id+"err").css('display','none');
    } 
}

function formValidation(formid,originalBorder="none",borderOnError="2px solid red",errmsg="is required")
{
  var elements = $("#"+formid+" .required");
  var errBox = $("#"+formid+" .requirederr");

   for(var i=0;i<elements.length;i++)
   {
      if(elements.eq(i).val()=="")
      {
        var name = elements.eq(i).attr('fieldname');
        errBox.eq(i).html(name + " " + errmsg);  
        elements.eq(i).css('border',borderOnError);
      }
      else
      {
        errBox.eq(i).html("");  
        elements.eq(i).css('border',originalBorder);
      }
   }
}