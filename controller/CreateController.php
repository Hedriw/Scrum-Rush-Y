<?php

class CreateController extends Controller{
	public function __construct(){
		
	}
	
	
	public function index(){
		$this->render("index");
	}
	public function about(){
		$this->render("about");
	}
}