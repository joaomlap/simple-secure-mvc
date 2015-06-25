<?php

class Controller{

	private $db = null;

	function __construct(){
		session_start();

		if (!isset($_SESSION['token'])) {
			$token = base64_encode( openssl_random_pseudo_bytes(32));
		    $_SESSION['token'] = $token;
		    $_SESSION['token_time'] = time();
		}
		else
		{
		    $token = $_SESSION['token'];
		}

		$this->openDatabaseConnection();
	}

	private function openDatabaseConnection(){

		$this->db = new PDO(DB_TYPE . ':' . DB_PATH, '', '');
  		$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}

	public static function factory($name){
		if(file_exists("app/controllers/$name.php"))
			require_once("app/controllers/$name.php");
		return new $name();
	}

	public function loadModel($modelName)
    {
        require_once DIR . 'app/models/' . $modelName . '.php';
        // return new model (and pass the database connection to the model)
        return new $modelName($this->db);
    }
}