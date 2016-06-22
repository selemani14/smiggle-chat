<?php
class router{
 public $getter;
  public function __construct()
	{
	  $this->getter = &$_GET;
	}


  public function gets()
	{
	  //var_dump($this->getter['smiggle']); die();
	  $url_part = explode('/', $this->getter['smiggle']);

	  $controller = $url_part[0];
	  $action = $url_part[1];
	  $class = $controller. 'controller';
	  
	  $controller = new $class();
	  $controller->$action();
	}
	
}

?>