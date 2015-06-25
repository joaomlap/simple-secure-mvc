<?php

class Autoload{

	public static function init(){

		// Base classes
		if(file_exists('app/config/init.php'))
			require_once("app/config/init.php");

		if(file_exists("app/controllers/Controller.php"))
			require_once("app/controllers/Controller.php");

		if(file_exists("app/models/Model.php"))
			require_once("app/models/Model.php");

		if(file_exists("app/libraries/View.php"))
			require_once("app/libraries/View.php");

		if(file_exists("app/libraries/Router.php"))
			require_once("app/libraries/Router.php");

	}

}