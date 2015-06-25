<?php

class HomeController extends Controller{
	
	public function index(){

		$view = new View("home");
		$view->render();
	}

}