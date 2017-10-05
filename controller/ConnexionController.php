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


	public function about(){
		$this->render("about");
	}
}