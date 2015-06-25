<?php

class UsersController extends Controller{

	protected $model = "User";

	public function index(){
		$user = $this->loadModel($this->model);
		$users = $user->all();
		$view = new View('list');
		$view->set('users', $users);
		$view->render();
		return;
	}

	public function add(){

		$method = $_SERVER['REQUEST_METHOD'];

		switch ($method) {

		  case 'GET':
		  		$view = new View('add');
		  		$view->render();
		  	break;

		  case 'POST':

		  	$user = $this->loadModel($this->model);

		  	if($_POST["token"] == $_SESSION["token"]){
		  		$email = $_POST["email"];
		  		if(strlen($email) < 2){
					$_SESSION["error_messages"] = "Email must have at least 2 (two) characters.";
					$view = new View('add');
					$view->render();
					return;
				}

				$email = trim($email);
				$email = htmlspecialchars($email);

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				    $_SESSION["error_messages"] = "Email must be in someone@somewhere.thing format.";
					$view = new View('add');
					$view->render();
					return;
				}

		  		$name = $_POST["name"];
		  		if(strlen($name) < 2){
					$_SESSION["error_messages"] = "Name must have at least 2 (two) characters.";
					$view = new View('add');
					$view->render();
					return;
				}
				$name = trim($name);
				$name = htmlspecialchars($name);

				$newUser = array();
				$newUser["email"] = $email;
				$newUser["name"] = $name;

				$user->add($newUser);

				$_SESSION["success_messages"] = "User added with success!!";
				$view = new View('add');
				$view->render();
				return;

		  	} else{
		  		$_SESSION["error_messages"] = "Not a valid form!";
				$view = new View('add');
				$view->render();
				return;
		  	}
		  	break;

		  default:
		  	$this->index();
		  	break;
		}
	}
	
}