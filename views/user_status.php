<?php
if($row[0]['login_status'] == 'off')
		{
			$chat_status ="<font color='#fff'>Status:</font> <font color='#cdc108'>Start chatting..</font>";
			$log_status ="<font color='#cdc108'>offline</font>";
			echo "$log_status <br/> $chat_status";
		}
		else
		{
			$chat_status = "<font color='#fff'>Status:</font> <font color='#77ec88'>continue chatting..</font>";
			$log_status ="<font color='#77ec88'>online</font>";
			echo "$log_status <br/> $chat_status";
		}
?>