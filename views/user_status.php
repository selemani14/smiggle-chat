<?php
if($row[0]['login_status'] == 'off')
		{
			$chat_status ="<de class='label label-danger' style='font-size:11px;'><font color='#fff'>Status:</font> <font color='#fff'>Start chatting..</font></de><br/>";
			$log_status ="<de class='label label-danger' style='font-size:11px;'><font color='#fff'>offline</font></de><br/>";
			echo "$log_status <br/> $chat_status";
		}
		else
		{
			$chat_status = "<de class='label label-success' style='font-size:11px;'><font color='#fff'>Status:</font> <font color='#fff'>continue chatting..</font></de><br/>";
			$log_status ="<de class='label label-success' style='font-size:11px;'><font color='#fff'>online</font></de><br/>";
			echo "$log_status <br/> $chat_status";
		}
?>
