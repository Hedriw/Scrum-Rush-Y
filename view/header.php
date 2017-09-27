<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
	<main>
	<header>
	
	<?php
	if(isset($_SESSION['user_session_id']))
	{
		echo("Bonjour ".$_SESSION['user_session_civ']." ".$_SESSION['user_session_nom']." ".$_SESSION['user_session_prenom']);
	}
	else
	{
		echo("Non connecté");
	}
	?>
	</br>

	<form action="http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion">
    <input type="submit" value="Connexion" />
	</form>

	//<a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion>Se connecter</a>
	<a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=research>Rechercher une vidéo</a>
	

	
	</header>
	<nav>
	</nav>
	<section>	
