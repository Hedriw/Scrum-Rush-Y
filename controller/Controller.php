<?php

$data = NULL;
$connnectData = NULL;

class Controller {

	public function __construct() {

	}

	public function render($view, $d=null) {
		global $data;
		global $connectData;

			if(isset($_SESSION['user_session_id']))
		{
			$connectData = " Bonjour ".$_SESSION['user_session_civ']." ".$_SESSION['user_session_nom']." ".$_SESSION['user_session_prenom'];
			/*$connectData = $connectData.'<button onclick="http://srv-tpinfo/G246/Scrum-Rush-Y/controller/ConnexionController.php.logout()">Deconnexion</button>';*/
			$connectData = $connectData.'<a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion/logout>Deconnexion</a>';
		}
		else
		{
			/*$connectData = "Non connecté";
			$connectData = $connectData.'<form action="http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion">';
			$connectData = $connectData.'<input type="submit" value="Connexion" />';
			$connectData = $connectData.'</form>';*/
			$connectData = '<a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion>Se connecter</a>';
		}

		include_once "view/header.php";

		$controller = get_class($this);  // SiteController
		$model = substr($controller, 0, 
			        strpos($controller, "Controller")); // Site
		$data = $d;

		



		include_once "view/".strtolower($model)."/".$view.".php";
		// view/site/index.php

		include_once "view/footer.php";
	}

}

