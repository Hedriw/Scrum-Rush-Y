<?php

class CreateController extends Controller{
	public function __construct(){
		
	}
	
	public function add(){
		if (!empty(parameters()["pseudo"])&&!empty(parameters()["email"])&&!empty(parameters()["mdp"])&&!empty(parameters()["genre"])&&
			!empty(parameters()["nom"])&&!empty(parameters()["prenom"])&&!(empty(parameters()["fixe"])&&empty(parameters()["portable"]))&&!empty(parameters()["magasin"])) 
		{
			$sql="Select * from ".User::$_table." where ach_mel='".parameters()["email"]."'";
			$st = db()->prepare($sql);
			$st->execute();
			$row = $st->fetch();
			if($row == null)
			{
				$user = new User();
				$address = new Address();
				$user->ach_pseudo = parameters()["pseudo"];
				$user->ach_mel = parameters()["email"];
				$user->ach_motpasse = parameters()["mdp"];
				$user->ach_civilite = parameters()["genre"];
				$user->ach_nom = parameters()["nom"];
				$user->ach_prenom = parameters()["prenom"];
				$user->ach_telfixe= parameters()["fixe"];
				$user->ach_telportable= parameters()["portable"];
				$user->mag_id=intval(parameters()["magasin"]);
				
				$address->ach_id=$user->ach_id;
				$address->adr_rue=parameters()["adresse"];
				$address->adr_complementrue=parameters()["cr"];
				$address->adr_cp=parameters()["cp"];
				$address->adr_ville=parameters()["ville"];
				$address->pay_id=parameters()["pays"];
				
				$this->render("add",$user);
			}
			else
			{
				$error="L'email est déjà utilisé";
				$this->render("index",$error);
			}
			
		} else if(empty(parameters()["fixe"])&&empty(parameters()["portable"]))
		{
			$error="Remplissez au moins un téléphone.";
			$this->render("index",$error);
		}
		else
		{
			$error="Un champs requis n'est pas rempli.";
			$this->render("index",$error);
		}
	}
		
	
	public function index(){
		$this->render("index");
	}
	public function about(){
		$this->render("about");
	}
}