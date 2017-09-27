<?php

class CreateController extends Controller{
	public function __construct(){
		
	}
	
	public function add(){
		if (isset(parameters()["pseudo"])) {
			$user = new User();
			$user->ach_pseudo = parameters()["pseudo"];
			$user->ach_mel = parameters()["email"];
			$user->ach_motpasse = parameters()["mdp"];
			$user->ach_civilite = parameters()["genre"];
			$user->ach_nom = parameters()["nom"];
			$user->ach_prenom = parameters()["prenom"];
			$user->ach_telfixe= parameters()["fixe"];
			$user->ach_telportable= parameters()["portable"];
			$user->ach_mag=parameters()["magasin"];
		} else {
			$this->render("add");
		}
	}
		
	
	public function index(){
		$this->render("index");
	}
	public function about(){
		$this->render("about");
	}
}