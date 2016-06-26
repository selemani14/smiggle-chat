<?php
if($num_rows > 0)
 {
foreach($row as $row)
{
?>
<div class="row">

  <div class='col-md-2 b1'>
	<img class='img-circle' src='person.gif' width='60' style="margin-top: 15%;margin-left: 15%;" />
  </div>
  <div class='col-md-8 b2'>
  
	<div class='box_top'>
		<div class='chatter'>
	<?php
	 	echo $row['email'];
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
		 
  	 
		<div class="speech-bubble" style="color:#428bca; font-weight:bold; text-transform:uppercase;">
  <div class="arrow bottom right"></div>
		No Data
		</div>

    <?php
	}
	
	
	
	?>
    <br/>
  
