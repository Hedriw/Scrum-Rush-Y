<?php

class ConnexionController extends Controller{
	public function __construct(){
		
	}
	
	/*function console($data) 
	{
		echo("<script>console.log('PHP: ".$data."');</script>");
	}*/

	public function login($uname,$upass)
	{
		//$this->console("pseudo : ".$uname." email : ".$umail." password : ".$upass);
		try
		{
			$stmt = db()->prepare("SELECT * FROM t_e_acheteur_ach WHERE ach_mel=:uname LIMIT 1");
			$stmt->execute(array(':uname'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			//$this->console("row :".$stmt->rowCount());
			if($stmt->rowCount() == 1)
			{
            //if(password_verify($upass, $userRow['ach_motpasse']))

				if(md5($upass)==$userRow['ach_motpasse'] )
				{
					$_SESSION['user_session_id'] = $userRow['ach_id'];
					$_SESSION['user_session_civ'] = $userRow['ach_civilite'];
					$_SESSION['user_session_nom'] = $userRow['ach_nom'];
					$_SESSION['user_session_prenom'] = $userRow['ach_prenom'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function index()
	{
		if (isset(parameters()["id"]) && isset(parameters()["mdp"]))
		{
			//$hashPW = password_hash(parameters()["mdp"]), PASSWORD_DEFAULT);
			$hashPW = parameters()["mdp"];
			if($this->login(parameters()["id"],$hashPW))
			{
				header("Location:.");    
			}
			else
			{
				$this->render("index","Adresse mail ou Mot de passe invalide");
			}		
		}
		else
			$this->render("index");
	}

	public function logout()
	{
		session_destroy();
        unset($_SESSION['user_session_id'],$_SESSION['user_session_civ'],$_SESSION['user_session_prenom'],$_SESSION['user_session_nom']);
        header('Location: .');
	}

	public function modification()
	{
		$bool=0;
		if(isset(parameters()["submit"]))
		{
			if(parameters()["submit"]=="Modifier")
		{
			$sql="select adr_id from t_e_adresse_adr where ach_id='".$_SESSION['user_session_id']."'";
			$st=db()->prepare($sql);
			if($st->execute())
			{
				$row=$st->fetch(PDO::FETCH_ASSOC);
				if(preg_match("/^[0]{1}[0-9]{9}$/",parameters()["fixe"])&&preg_match("/^[0]{1}[0-9]{9}$/",parameters()["portable"])) 
				{
					$bool=1;
					$address = new Address($row["adr_id"]);
					$user = new User($address->ach_id->ach_id);
					$user->ach_pseudo = parameters()["pseudo"];
					$user->ach_mel = parameters()["email"];
					$user->ach_civilite =parameters()["genre"];
					$user->ach_nom = parameters()["nom"];
					$user->ach_prenom = parameters()["prenom"];
					$user->ach_telfixe= parameters()["fixe"];
					$user->ach_telportable= parameters()["portable"];
					$user->mag_id=intval(parameters()["magasin"]);
					
					$address->adr_rue=parameters()["adresse"];
					$address->adr_complementrue=parameters()["cr"];
					$address->adr_cp=parameters()["cp"];
					$address->adr_ville=parameters()["ville"];
					$address->pay_id=parameters()["pays"];
					
					$data="votre compte a bien été modifié";
					$_SESSION['user_session_civ'] = parameters()["genre"];
					$_SESSION['user_session_nom'] = parameters()["nom"];
					$_SESSION['user_session_prenom'] = parameters()["prenom"];
					$this->render("valmodification",$data);	
				}
				else if(preg_match("/^[0]{1}[0-9]{9}$/",parameters()["fixe"])&&empty(parameters()["portable"])||parameters()["portable"]==" ")
				{
					$bool=1;
					$address = new Address($row["adr_id"]);
					$user = new User($address->ach_id->ach_id);
					
					$user->ach_pseudo = parameters()["pseudo"];
					$user->ach_mel = parameters()["email"];
					$user->ach_civilite =parameters()["genre"];
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
					
					$data="Votre compte a bien été modifié";
					$_SESSION['user_session_civ'] = parameters()["genre"];
					$_SESSION['user_session_nom'] = parameters()["nom"];
					$_SESSION['user_session_prenom'] = parameters()["prenom"];
					$this->render("valmodification",$data);
				}else if(preg_match("/^[0]{1}[0-9]{9}$/",parameters()["portable"])&&(empty(parameters()["fixe"])||parameters()["fixe"]==" "))
				{
					$bool=1;
					$address = new Address($row["adr_id"]);
					$user = new User($address->ach_id->ach_id);
					$user->ach_pseudo = parameters()["pseudo"];
					$user->ach_mel = parameters()["email"];
					$user->ach_civilite =parameters()["genre"];
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
					
					$data="Votre compte a bien été modifié";
					$_SESSION['user_session_civ'] = parameters()["genre"];
					$_SESSION['user_session_nom'] = parameters()["nom"];
					$_SESSION['user_session_prenom'] = parameters()["prenom"];
					$this->render("valmodification",$data);
					
				}else
				{
					$data["error"]="Le numéro de téléphone n'est pas valide";
				}
			}	
			else
			{
				$data["error"]="Problème survenue veuillez réessayer";
			}
			
		}
		else if(parameters()["submit"]=="Annuler")
		{
			header("Location:.");
		}
		}
		
		if($bool==0)
		{
			$_SESSION['user_session_id'];
			$user = new User($_SESSION['user_session_id']);
			$data["user"]=$user;
			$sql="select adr_id from t_e_adresse_adr where ach_id='".$_SESSION['user_session_id']."'";
			$st=db()->prepare($sql);
			$row=$st->execute();
			if($row!=null)
			{
				$adresse=$st->fetch(PDO::FETCH_ASSOC);
				$adress=new Address($adresse['adr_id']);
				$data["adresse"]=$adress;
			}
			else
			{
				$data["adresse"]="";	
			}
			$this->render("modification",$data);
		}
		
	}

	public function about(){
		$this->render("about");
	}
}