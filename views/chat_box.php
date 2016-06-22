<?php
echo "<div class='box1'>";
if($row !== 0)
 {
	foreach($row as $row)
	{
	?>
	
<div class="row" style="border-bottom:1px solid #ccc;">

  <div class='col-md-2 b1'>
	<img class='img-circle' src='person.gif' width='60' style="margin-top: 15%;margin-left: 15%;" />
  </div>
  <div class='col-md-8 b2'>
  
	<div class='box_top'>
		<div class='chatter'>
	<?php
	if($_SESSION['user'] ==	$row['email'])
	{
	 	echo "Me";
	}
	else
	{
		echo $row['email'];
	}
	 ?>	</div>
    </div>
	<div class='box_bottom'>
	<div class='message'>
    <?php echo $row['message']; ?>
	</div>
    </div>
    
  </div>
  
  <div class='col-md-2 b3'>

	<div class='box_top'>
    	<div class='timing'><?php echo $row['date']; ?></div>
    </div>
	<div class='box_bottom'>
    	
    </div>

  </div>
</div>    
    <?php } 
	}
	else
	{
		?>
			 
		<div class="speech-bubble">
  <div class="arrow bottom right"></div>
		No Data
		</div>
    <?php
 }
	
?>
<br/>
 </div>

   <div style="display:block;">

   <input type='hidden' class='sent_from' value='<?php echo $sent_from; ?>' />
   <input type='hidden' class='sent_to' value='<?php echo $sent_to; ?>' />
   <input type='hidden' class='linked' value='init.php?smiggle=<?php 
   $parts = explode('=', $_GET['smiggle']);
echo implode("/", $parts); ?>' />

  
  </div>

    <br/><br/>
