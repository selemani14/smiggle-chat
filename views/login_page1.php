<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMIGGLE LOGIN PAGE</title>

<link href="css/bootstrap.min.css" rel="stylesheet" />


<style type="text/css">
html,body{
	margin-left: 0px;
        margin-right: 0px;
		background-color:#da7112;
		background-image:url(couple1.jpg);
		background-attachment:fixed;
		background-position:center;
		background-repeat:no-repeat;
}
body{font-family:"Open Sans", sans-serif;font-size:16px;line-height:24px;font-weight:300;color:#555555}
h1{font-weight:300;font-size:35px;line-height50px}h2{font-weight:300;font-size:32px;line-height:48px}
.top
{
	width: 100%;
	height: 122px;
	background-color:#8c9b9f;
	

}
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	width:200px;
	height:394px;
	z-index:2;
	left: 919px;
	top: 196px;
}
#apDiv3 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
}
#apDiv4 {
	position:absolute;
	width:569px;
	height:356px;
	z-index:3;
	left: 94px;
	top: 203px;
}
#apDiv5 {
	position:absolute;
	width:204px;
	height:178px;
	z-index:4;
	left: 638px;
	top: 264px;
}
.navbar-default
{
	
	color: #fff;
}
.navbar-nav .active
{
	
	color: #fff;
}
.container-fluid
{
background-color:#8c9b9f;
margin-left: 150px;
padding-top: 10px;

	
	color: #fff;
}
.nav .navbar-nav li a{
  color: #fff;
}
.nav-pills > li.active > a,
.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:focus {
  color: #fff;
  background-color: #dddddd;
}
.nav-pills > li > a,
.nav-pills > li > a:hover,
.nav-pills > li > a:focus {
  color: #fff;

}
.navbar
{
	background-color:#8c9b9f;
}
.opex_logo
{
 margin-left: 150px;
	
}
.modal, .modal-dialog, .modal-body{
	margin: 0px;
 width: 100%;
 height: 100%;
background-color:#fff;
}

.containers_stat{
	margin-left: 140px;
}
.containers_stat img{
  width: 100%;
}
.row{
	
}

.col-md-6{
border: 1px solid #eee;
}
.copys{
	color: #8c9b9f;
	width: 100%;
border: 1px solid eee;
}
.col-md-3, .col-md-4{
	
border: 1px solid #eee;
	}
.col-md-12{
	background-color:#8c9b9f;
	color: #fff;
	}
.btnn{
	background-color:#8c9b9f;
	color: #fff;
}
#btn_activate{
	background-color:#8c9b9f;
	color: #fff;
}
#cont_btn{
	display:none;
}
h4{
	font-size:30px;
	text-align:center;
	}
	.spaces
	{
		margin: 5%;
		border: 10px solid eee;
	}
		.spaces1
	{
		
		border-bottom: 10px solid eee;
		color: #8c9b9f;
	}
	.shifta
	{
		margin-left:40px;
	}
	.st
	{
		color: #ccc;
		font-size: 14px;
	}
	.st_period
	{
		color: #fff;
		font-size: 14px;
		float: right;
		
		height:30px;
		background-color: #8c9b9f;
		border-radius: 10px;
		border: 2px solid #8c9b9f;
	}
h1
{
	color:#fff;

	font-size:22px;
}
.container{
	margin-top: 13%;
margin-left: 25%;
width: 50%;
color: #fff;


}
.bt{
background-color:#8c9b9f;
color: #fff;
height: 60px;
width: 40%;
font-size:15px;
border: 1px solid #8c9b9f;
}
.logo{
display:block;
text-align:center;
}
.logo img
{
width: 60%;

}
</style> 
 
</head>

<body>

<div class='container'>
<form action="index.php?smiggle=index/index" method="post"  enctype="multipart/form-data" class'login_form'>
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WELCOME TO SMIGGLE CHAT !</H1>
<?php
if(isset($message))
{
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size='-3'>$message</font>";
}
?>

<div class="form-group">



    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Enter userName">

  </div>


<div class="form-group">

  

    <input class="form-control" name="password" type="password" placeholder="Enter Password">


  </div>


<div class="form-group">
<div class='btn sender'>SIGN IN HERE</div>
</div>
</form>
</div>


  <script src="js/jquery-1.8.2.js"></script>
  <script>
$(document).ready(function(){
   $('.sender').click(function(){
   
		 $("form").submit();
		 	
	});

});
</script>
</body>
</html>
