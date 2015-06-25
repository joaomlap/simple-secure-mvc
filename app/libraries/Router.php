<?php

class Router{

	private $path;
	private $defaultController;
	private $defaultAction;

	private $controller;
	private $action;
	private $arguments;


	public function __construct($path){
		$this->path = $path;
	}

	public function setDefaultController($name){
		$this->defaultController = $name;
	}

	public function setDefaultAction($name){
		$this->defaultAction = $name;
	}

	/////////////////////////////////////////////////////////////////////////
	// Really usefull function to call camelCased methods from dashed URLs //
	// by webbiedave in stackoverflow.com/questions/2791998/               //
	/////////////////////////////////////////////////////////////////////////
	
	public function dashesToCamelCase($string, $capitalizeFirstCharacter = false){

	    $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

	    if (!$capitalizeFirstCharacter && strlen($str) > 0) {
	        $str[0] = strtolower($str[0]);
	    }

	    return $str;
	}
	/////////////////////////////////////////////////////////////////////////

	public function parse()
	{

		if($this->path == null)
			$this->path = '';
			
		$bits = explode('/', $this->path);
				
		$this->controller = array_shift($bits);
		$this->action = array_shift($bits);
		
		if(strlen($this->controller) < 1)
			$this->controller = $this->defaultController;
		else
			$this->controller = $this->dashesToCamelCase($this->controller, true) . "Controller";
			
		if(strlen($this->action) < 1)
			$this->action = $this->defaultAction;
		else
			$this->action = $this->dashesToCamelCase($this->action, false);
			
		if(count($bits) > 0)
			$this->arguments = $bits;
	}
	
	// static public function buildPath($bits)
	// {
	// 	return 'index.php?action=' . implode('/', $bits);
	// }
	
	public function getController()
	{
		return $this->controller;
	}
	
	public function getAction()
	{
		return $this->action;
	}
	
	public function getArguments()
	{
		return $this->arguments;
	}


}