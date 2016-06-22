<?php
Class indexcontroller 
{
 	private $db, $global_vars, $views, $id;
    public function __construct()
	{
		session_start();
		$this->db = IOC::make('database', array());
		$this->global_vars = IOC::make('g_variables', array());
		$this->views = IOC::make('views', array());
		if(isset($_SESSION['user_id']))
		{
			$this->id  = $_SESSION['user_id'];
		}
	}
 
	public function index() {
		
		/*** set a template variable ***/
		$username= @$this->global_vars->post_data('username');
		$encrypt_password= @$this->global_vars->encrypt_password($this->global_vars->post_data('password')); 
		
		if((isset($username) && !empty($username))&& (isset($encrypt_password)
		 && !empty($encrypt_password)))
		{
		 
			// Check matching of username and password.
			list($affect_rows, $data) = $this->db->loginUsers($username, $encrypt_password);
			if($affect_rows!='0'){ // If match.
			$id = $data[0]['id'];
			session_start();
			$this->global_vars->set_sessions('user_id', $id);
			$this->global_vars->set_sessions('user', $username);
			$this->db->updateLoginStatus("on", $id);
			//var_dump($_SESSION); die();
			//$_SESSION['user_id']= $id;
			//$_SESSION['user'] = $username;
			//$this->global_vars->set_sessions('username', $reso[1]);
			header('Location: index.php?smiggle=chatPage/index'); // Re-direct to main.php
			}
			else
			{
				$message="<br/>--- Incorrect Username or Password ---";
		  		$this->views->message=$message;	
			}
		}
		else
		{
		 	//$message="<br/>--- Incorrect Username or Password ---";
		  	//$this->views->message=$message;	
		}
		
		
	
		$this->views->shows('login_page1');
	
	
			
	}
	public function logout() {
		session_start();
		
		$this->db->updateLoginStatus("off",$this->id);
		session_destroy();
		header('Location: index.php?smiggle=index/index');

}



}

?>
