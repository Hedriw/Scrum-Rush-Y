<?php

$data = NULL;
$connnectData = NULL;

class Controller {

	public function __construct() {

	}

	public function render($view, $d=null) {
		global $data;
		global $connectData;
		global $user_info;

		$connectData="";
		if(isset($_SESSION['user_session_id']))
		{
			
			$connectData = $connectData.'<li class="hvr-underline-from-center"><a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion/logout data-mui-toggle="tab" data-mui-controls="pane-justified-1"> Deconnexion</a></li>';//<!--class="mui--is-active" in li-->
			$connectData = $connectData.'<li class="hvr-underline-from-center"><a href = "http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion/modification" data-mui-toggle="tab" data-mui-controls="pane-justified-1">Modifier mon compte</a></li>';
			$user_info = "Bonjour ".$_SESSION["user_session_civ"]." ".$_SESSION["user_session_nom"]." ".$_SESSION["user_session_prenom"];

			

		}
		else
		{
			$connectData = $connectData.'<li class="hvr-underline-from-center"><a href = "http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion" data-mui-toggle="tab" data-mui-controls="pane-justified-1">Se Connecter</a></li>';
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

