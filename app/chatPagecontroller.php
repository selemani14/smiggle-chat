<?php
class chatPagecontroller
{
private $db, $global_vars, $views;

    public function __construct()
	{
		$this->db = IOC::make('database', array());
		$this->global_vars = IOC::make('g_variables', array());
		$this->views = IOC::make('views', array());
	}
    
	public function index()
	{
	session_start();
	$this->global_vars->un_authorized();
	//var_dump($_SESSION); exit;
	  $url = $this->global_vars->url_query('smiggle');	
	  $url_part = explode('/', $url);
	  list($affect_rows, $data) = $this->db->selectUsers();
	  $user = $this->global_vars->get_sessions('user_id');
	  list($affect_rows1, $data1) = $this->db->userUnreadMessages($user);
	  $this->views->unread_message_count = $data1;
	  $this->views->num_rows = $affect_rows;
	  $this->views->row = $data;
	  $setss = $this->global_vars->get_sessions('user');
	  //var_dump($_SESSION['user_id']); die(); 
	  $this->views->logedIn_user = $this->global_vars->get_sessions('user');
	  $this->views->logedIn_id = $this->global_vars->get_sessions('user_id');
		$this->views->shows('index_mvc');
	}
	public function insert_chat()
	{
	  session_start();
	  $this->global_vars->un_authorized();
	  $sent_from = $this->global_vars->post_data("sent_by");	
	  $sent_to = $this->global_vars->post_data("sent_to");
	  $message = $this->global_vars->post_data("message");
	  $this->db->insertMessages($sent_from, $sent_to, $message);		
	}
	public function Retrieve_chat_box1()
	{
	  session_start();
	  $this->global_vars->un_authorized();
	  $url = $this->global_vars->url_query('smiggle');	
	  $url_part = explode('/', $url);
	  list($affect_rows, $data) = $this->db->getMessages($url_part[2], $url_part[3]);
	  $this->views->num_rows = $affect_rows;
	  $this->views->row = $data;
	  $this->views->sent_from = $url_part[2];
	  $this->views->sent_to = $url_part[3];
		$this->views->shows('chat_box');
	}
	
		public function Retrieve_chat_box2()
	{
	  session_start();
	  $this->global_vars->un_authorized();
	  $url = $this->global_vars->url_query('smiggle');	
	  $url_part = explode('/', $url);
	  list($affect_rows, $data) = $this->db->getMessages($url_part[2], $url_part[3]);
	  $this->views->num_rows = $affect_rows;
	  $this->views->row = $data;
	  $this->views->sent_from = $url_part[2];
	  $this->views->sent_to = $url_part[3];
		$this->views->shows('chat_box1');
	}
}
?>