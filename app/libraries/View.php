<?php

class View
{
	private $attributes = null;
	private $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public function set($key, $value)
	{
		$this->attributes[$key] = $value;
	}
	
	public function get($key)
	{
		return $this->attributes[$key];
	}
	
	public function render()
	{
		if($this->attributes != null)
			extract($this->attributes);

		require('app/views/' . strtolower($this->name) . '.php');
	}
}