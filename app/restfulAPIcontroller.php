<?php
class restfulAPIcontroller
{
private $db, $global_vars, $views;

    public function __construct()
	{
		$this->db = IOC::make('database', array());
		$this->global_vars = IOC::make('g_variables', array());
		$this->views = IOC::make('views', array());
	}
    
	public function getMessages()
	{
	  $url = $this->global_vars->url_query('smiggle');	
	  $url_part = explode('/', $url);  
	  if(isset($url_part[2]) && isset($url_part[3]))
	  {
		  list($affect_rows, $data) = $this->db->getMessagesRest($url_part[2], $url_part[3]);
		  $this->views->data = $data;
		  $this->views->affect_rows = $affect_rows;
		  $this->views->shows('restful_client');
	  }
	}
}
?>