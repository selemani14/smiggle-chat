
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>chat system</title>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
.circle
{
	background:#003366;	
	
}
.b
{
	display:block;
	width:10px;
	height:10px;
	border-radius: 50%;
}
.pad
{
	
	height:100%;
}
.modal-dialog{
    /* new custom width */
    width: 580px;
    /* must be half of the width, minus scrollbar on the09 left (30px) */
    margin-left: 15px;
}

.speech-bubble {
    background-color: #f8f8f8;
    border: 1px solid #c8c8c8;
    border-radius: 5px;
    width: 280px;
    text-align: center;
    padding: 20px;
    
margin-left:10px;
}
.speech-bubble .arrow {
    border-style: solid;
    position: absolute;
}
 
.bottom {
    border-color: #c8c8c8 transparent transparent transparent;
    border-width: 12px 0px 8px 8px;
    left: -8px;
}
.box1
{
display:block;
width:100%;
height:200px;


}
.message
{
width:250px;
 height:50px;
}
.chaty
{
overflow:auto;
}
h6, .directioner
{
display:none;
}
.ui-dialog-titlebar {
  background: orange;
}
.ui-button {
  background: #CCCCCC;
  border: 1px solid #B8B8B8;
  color: #000;
  font-weight: bold;
}
.do
{
  height: 100%;
  width:280px;
  background: #333;
  margin-right:-2%;
  padding-right:-2%;
  
}
.balls{
display:;
border-radius: 50%;

width:10px;
height: 10px;
float:right;

}
.c1{
background-color: green;

}
#apDiv1 {

	width: 100%;
	height:490px;
	background-color: #FFFFFF;
	border: 1px solid #FFFFFF;
	border-radius: 9px;
	padding:15px;
	
}
.chatts
{
   display:block;
    height: 100%;
    width: 100%;
	overflow:scroll;
}
body
{
	
	background-color:#da7112;
}
.b1
{
	height: 100px;
	
	
}
.b2
{
	height: 100px;
	margin-1eft: 2%;
	margin-right: 0px;
	padding-right: 0px;
}
.b3
{
	height: 100px;
	margin-1eft: 2%;
	margin-right: 0px;
	padding-right: 0px;
}
.box_top
{
	display:block;
	width: 100%;
	height: 38%;
	margin-1eft: 1%;
	padding-top: 1%;
}
.box_bottom
{
	display:block;
	width: 100%;
	height: 59%;
	margin-1eft: 1%;
	padding-top: 1%;
}
.timing
{
	color: #ddd;
	font-family: century gothic;

}
.chatter
{
	color: #e99409;
	font-family: century gothic;
	font-weight:bold;
	font-size:15px;
	text-transform: uppercase;
}
.message
{
	color:#999;
	font-family: century gothic;
}
</style>
</head>
<body>
        


<nav class="navbar navbar-inverse navbar-fixed-top" style='background-color:#da7112; border-bottom-color:#da7112;'>
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand" style='color:#fff;font-family: century gothic;'>SMIGGLE</div>
    </div>
    <div>
     
      <ul class="nav navbar-nav navbar-right">
        <li style='color:#fff;font-family: century gothic;margin-top:7px;'><?php echo $_SESSION['user']; ?>&nbsp;&nbsp;<img class='img-circle' src='person.gif' width='20' />&nbsp;</li>
            <li style='margin-top:0px; padding-top:0px;'><a href="index.php?smiggle=index/logout" style='color:#fff;font-family: century gothic;margin-top:0px; padding-top:9px; display:block;'>lOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<br/><br/><br/><br/>
<div class="container-fluid">

<div class='row'>

<div class='col-md-10'>

    <div id="apDiv1">
        <div class='chatts'>
        &nbsp;
        </div>
      
    </div>
    <div class='row'>
        <div class='col-md-8'>
        <input type="text" class="form-control" name="username" placeholder="Enter Message" style="width:100%;margin-top:1%;"  id='message' />
        </div>
         <div class='col-md-4'>
        	<button type="button" class="btn btn-danger sender" style='background: #333; border-color:#333; width:50%; height: 80%; margin-top:4%;'>Send Message</button>
        </div>
    </div>
</div>

<div class='col-md-2' style="margin-left:0px; padding-left:0px;">

<ul class="list-group" style="margin-left:0px; padding-left:0px;">
<h5 class="list-group-item active" style='background: #da7112; width:220px;border-style:none; color:#fff;margin-left:0px; padding-left:0px;"'>
   Users List
  </h5>
<?php
$count = 1;
$counts = 0;
$t  ="/";
//$unread_message_num[0] = 'one';
foreach($unread_message_count as $num_data)
{
	$unread_message_num[$counts] = $num_data['unread_messages'];
	$counts++;
}

//var_dump($unread_message_num); die();
$add_count = 0;
	foreach($row as $row)
	{
	  if($row['id'] !== $logedIn_id)
	  {
	  	if($row['login_status'] == 'off')
		{
			$chat_status ="<font color='#fff'>Status:</font> <font color='#cdc108'>Start chatting..</font>";
			$log_status ="<font color='#cdc108'>offline</font>";
		}
		else
		{
			$chat_status = "<font color='#fff'>Status:</font> <font color='#77ec88'>continue chatting..</font>";
			$log_status ="<font color='#77ec88'>online</font>";
		}
	   echo "<a  class'btn btn-primary james$count' data-toggle='modal' data-target='.bs-example-modal-sm'><li class='list-group-item' style=' width:240px;border-style:none; color:#fff;font-family: calibri;font-size:13px;text-transform: uppercase;background: #da7112;margin-left:0px; padding-left:0px;'> <img class='img-circle' src='person.gif' width='20' />&nbsp;&nbsp;".$row['email']." | <span>".$log_status."  <br/>
$chat_status </span><br />UNREAD:<b>".$unread_message_num[$add_count]."</b></li><div class='directioner'>index.php?smiggle=chat/Retrieve_chat_box1/".$logedIn_id."/".$row['id']."</div></a> <h6>".$row['id']."</h6>";
	  $add_count++;
	  }
	  
	}
//$unread_message_num[$add_count]
?>
</ul>
<input type='hidden' class='register_link'  />
<input type='hidden' class='use_num'  value="<?php echo $_SESSION['user_id']; ?>" />

</div>

</div>
</div>
</div>
</div>


	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery-ui-1.9.1.custom.js"></script>
<script src='js/selemaniChat1_mvc.js'></script>
<script src="js/bootstrap.min.js"></script>


</body>

</html>