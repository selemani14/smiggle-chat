<?php
if($affect_rows !== 0)
{
header('content-type: application/json');
	  foreach($data as $val)
	  {
	  	$messages[]= array('user'=>$val['email'],'message'=>$val['message'], 'date' =>$val['date']);
	  }
	  echo json_encode($messages);
	  }
?>