<?php
    include '../phpcrudfiles/feedbackcrud.php';
    $con = mysqli_connect("localhost","root","","spreadsmile");
    $feedback = new feedback($con);
    if(isset($_POST['action']) && $_POST['action']=="dlt")
    {
        $feedback->dlt_feedback($_POST['dltid']);
    }
    $getfeedback = $feedback->get_feedback();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: hidden;
        }
        ::-webkit-scrollbar
        {
            display: none;
        }
        .feedback_page_container
        {
            width: 100%;
        }
        .feedback_page_title
        {
            text-align: center;
            position: fixed;
            width: 100%;
            border-bottom: 2px solid black;
            padding: 10px;
            background-color: brown;
            color: white;
        }
        .feedback_page_content
        {
            margin-top: 70px;
            overflow-y: scroll;
            height: 80vh;
            background-color: grey;
        }
        .feedbackcontainer
        {
            width: 90%;
            margin: 15px auto 15px auto;  
            border-radius: 10px;
            padding: 0px;
        }
        .feedbackheader
        {
            width:100%;
            margin: 0px;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: brown;
            color: white;
            font-size: 20px;
        }
        .feedbackcontent
        {
            width:100%;
            margin: 0px;
            padding: 15px;
            border:2px solid brown;
            border-top:0px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: #ffffd7;
            color: black;

        }
        .feedback_msg_title,.feedback_sugg_title
        {
           
            font-size: 20px;
            font-weight: bolder;
            display: inline-block;
        }
        .feedback_msg_content,.feedback_sugg_content
        {
            display: inline-block;
            font-size: 18px;
            letter-spacing: .7px;
            word-break: break-all;
        }
        .div
        {
            width: 100%;
        }
    </style>


<div class="feedback_page_container">
    <div class="feedback_page_title">
        <h1>Feed back</h1>
    </div>
    <div class="feedback_page_content">
        <?php
            foreach($getfeedback as $key=>$value)
            {
        ?>
                <div class="feedbackcontainer">
                    <div class="feedbackheader" id=""><?php echo $value['name']; ?><span style="float: right;cursor: pointer;font-size: 20px;" onclick="dltfeedback(<?php echo $value['feedback_id']; ?>)">❌</span></div>
                    <div class="feedbackcontent">
                        <div class="div">
                            <?php 
                                for ($i=0; $i <$value['feedback_star'] ; $i++) 
                                { 
                             ?>
                                    <img src="../images/star.png" height="20" width="20">
                             <?php       
                                }
                             ?>      
                        </div>
                        <div class="div">
                            <div class="feedback_msg_title">
                                Feedback :
                            </div>
                            <div class="feedback_msg_content">
                                <?php echo $value['feedback_msg']; ?>
                            </div>
                            
                        </div>
                        <div class="div">
                            <div class="feedback_sugg_title">
                                 Suggestion : 
                            </div>
                            <div class="feedback_sugg_content">
                                <?php echo $value['feedback_sugg']; ?>
                            </div>        
                        </div>     
                    </div>
                   
                </div>
        <?php       
            }
        ?>
    </div>
</div>
<script type="text/javascript">
    function dltfeedback(dltid)
    {
        $.ajax({
            url:"feedback.php",
            method:"post",
            data:{"action":"dlt","dltid":dltid},
            success:function(mydata)
            {
                $('#content').html(mydata);
            }
        });
    }
</script>