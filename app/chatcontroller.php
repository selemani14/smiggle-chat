<?php
class chatcontroller
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

	}
	public function insert_chat()
	{
	  session_start();
	  $this->global_vars->un_authorized();
	  $sent_from = $this->global_vars->post_data("sent_by");	
	  $sent_to = $this->global_vars->post_data("sent_to");
	  $message = $this->global_vars->post_data("message");
	  $email = $this->global_vars->get_sessions('user');
	  $this->db->insertMessages($sent_from, $sent_to, $message, $email);
	  list($affect_rows, $data) = $this->db->unreadMessages($sent_from, $sent_to);
	  $count = (int) $data[0]['unread_messages'] + 1;	
	  $this->db->updateUreadMessaages($count, $sent_from, $sent_to);	
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
		public function Retrieve_user_status()
	{
	  session_start();
	  $this->global_vars->un_authorized();
	  $url = $this->global_vars->url_query('smiggle');	
	  $url_part = explode('/', $url);
	  list($affect_rows, $data) = $this->db->selectUsersStatus($url_part[2]);
	  $this->views->num_rows = $affect_rows;
	  $this->views->row = $data;
		$this->views->shows('user_status');
	}
			public function count_unread_messages()
	{
	  session_start();
	  $this->global_vars->un_authorized();
	  $url = $this->global_vars->url_query('smiggle');	
	  $url_part = explode('/', $url);
	  $id = $this->global_vars->get_sessions('user_id');
	  //var_dump($id); die();
	  list($affect_rows, $data) = $this->db->unreadMessages($url_part[2], $id);
	  $this->views->num_rows = $affect_rows;
	  $this->views->row = $data;
		$this->views->shows('unread_message_count');
	}
				public function reset_unread_messages()
	{
	  session_start();
	  $this->global_vars->un_authorized();
	  $url = $this->global_vars->url_query('smiggle');	
	  $url_part = explode('/', $url);
	  $id = $this->global_vars->get_sessions('user_id');
	  //var_dump($id); die();
	  list($affect_rows, $data) = $this->db->updateUnreadStatus($id, $url_part[2]);
	}
}
?>