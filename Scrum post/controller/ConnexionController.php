<?php

class ConnexionController extends Controller{
	public function __construct(){
		
	}
	
	
	public function index(){
		if (isset(parameters()["id"]) && isset(parameters()["mdp"]))
		{
			if (parameters()["mdp"]=="123"&&parameters()["id"]=="blublu")
			{	
				parameters()["r"]="";
				parameters()["id"]="";
				parameters()["mdp"]="";
				header('Location:.');
			}
			else
			{
				$this->render("index","Mauvais identifiant ou mdp");
			}	
			
		}
		else
			$this->render("index");
	}
	public function about(){
		$this->render("about");
	}
}