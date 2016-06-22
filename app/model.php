<?php
class model{

private static $instance = NULL;
public static $dbconfigs;

	public function __construct($config) {
	
	  	self::$dbconfigs = $config;
		
	}

	public static function getInstance() {
	
	if (!self::$instance)
		{
		$db_details = self::$dbconfigs;
		self::$instance = IOC::make('PDO', $db_details);
		self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	return self::$instance;
	}

	public function loginUsers($param1, $param2) {
	
		$handle = self::getInstance();
		$query = $handle->query("select * from users where email='".$param1."' and password='".$param2."'");
		if($query)
		{
			$affected_rows = $query->rowCount();
		}
		else
		{
			$affected_rows = 0;
		}
		
		while($result = $query->fetch(PDO::FETCH_ASSOC))
			{
				$rows[]=$result;
			}
			if($affected_rows>0)
			{
			$rows;
			}
			else
			{
			$rows = 0;
			}
			return array($affected_rows,$rows);
		}

	public function unreadMessages($param1, $param2) {
	
		$handle = self::getInstance();
		$query = $handle->query("select * from unread_messages where sent_from=$param1 and sent_to=$param2");
		if($query)
		{
			$affected_rows = $query->rowCount();
		}
		else
		{
			$affected_rows = 0;
		}
		
		while($result = $query->fetch(PDO::FETCH_ASSOC))
			{
				$rows[]=$result;
			}
			if($affected_rows>0)
			{
			$rows;
			}
			else
			{
			$rows = 0;
			}
			return array($affected_rows,$rows);
		}


public function userUnreadMessages($param1) {
	
		$handle = self::getInstance();
		$query = $handle->query("select * from unread_messages where sent_to=$param1");
		if($query)
		{
			$affected_rows = $query->rowCount();
		}
		else
		{
			$affected_rows = 0;
		}
		
		while($result = $query->fetch(PDO::FETCH_ASSOC))
			{
				$rows[]=$result;
			}
			if($affected_rows>0)
			{
			$rows;
			}
			else
			{
			$rows = 0;
			}
			return array($affected_rows,$rows);
		}



	public function selectUsers() {
	
		$handle = self::getInstance();
		$query = $handle->query("select * from users");
		if($query)
		{
			$affected_rows = $query->rowCount();
		}
		else
		{
			$affected_rows = 0;
		}
		
		while($result = $query->fetch(PDO::FETCH_ASSOC))
			{
				$rows[]=$result;
			}
			if($affected_rows>0)
			{
			$rows;
			}
			else
			{
			$rows = 0;
			}
			return array($affected_rows,$rows);
		}

public function selectUsersStatus($id) {
	
		$handle = self::getInstance();
		$query = $handle->query("select * from users where id=$id");
		if($query)
		{
			$affected_rows = $query->rowCount();
		}
		else
		{
			$affected_rows = 0;
		}
		
		while($result = $query->fetch(PDO::FETCH_ASSOC))
			{
				$rows[]=$result;
			}
			if($affected_rows>0)
			{
			$rows;
			}
			else
			{
			$rows = 0;
			}
			return array($affected_rows,$rows);
		}

	public function getMessages($param1, $param2) {
	
		$handle = self::getInstance();
		$query = $handle->query("SELECT * FROM messages where (sent_from=$param1 and sent_to=$param2) or (sent_from=$param2 and sent_to=$param1)");
		if($query)
		{
			$affected_rows = $query->rowCount();
		}
		else
		{
			$affected_rows = 0;
		}
		
		while($result = $query->fetch(PDO::FETCH_ASSOC))
			{
				$rows[]=$result;
			}
			if($affected_rows>0)
			{
			$rows;
			}
			else
			{
			$rows = 0;
			}
			return array($affected_rows,$rows);
		}
	
	
	
	
	public function getMessagesRest($param1, $param2) {
	
		$handle = self::getInstance();
		$query = $handle->query("SELECT * FROM messages where (sent_from
		in (select id from users where email ='$param1')
		 and sent_to
		 in (select id from users where email ='$param2')) 
		 or 
		 (sent_from
		 in (select id from users where email ='$param2')
		 and sent_to
		 in (select id from users where email ='$param1'))");
		if($query)
		{
			$affected_rows = $query->rowCount();
		}
		else
		{
			$affected_rows = 0;
		}
		
		while($result = $query->fetch(PDO::FETCH_ASSOC))
			{
				$rows[]=$result;
			}
			if($affected_rows>0)
			{
			$rows;
			}
			else
			{
			$rows = 0;
			}
			return array($affected_rows,$rows);
		}
	
	
	
	
	public function insertMessages($param1, $param2, $messages, $email) {
	
		$handle = self::getInstance();
		$query = $handle->query("INSERT INTO  `messages` (
	`id` ,
	`sent_from` ,
	`sent_to` ,
	`message` ,
	`email` ,
	`date`
	)
	VALUES (
	NULL ,  '{$param1}', '{$param2}', '{$messages}', '{$email}', NOW())");
	
	} 
	
	public function updateUreadMessaages($param1, $param2, $param3) {
	
		$handle = self::getInstance();
		$query = $handle->query("update unread_messages set unread_messages = $param1 where sent_from = $param2 and sent_to = $param3");
	
		}


	
	public function updateLoginStatus($param1, $param2) {
	
		$handle = self::getInstance();
		$query = $handle->query("update users set login_status = '".$param1."' where id =$param2;");
	
		}
		
	public function updateUnreadStatus($param1, $param2) {
	
		$handle = self::getInstance();
		$query = $handle->query("update unread_messages set unread_messages = 0 where sent_from =$param2 and sent_to =$param1  ;");
	
		}
}
?>
