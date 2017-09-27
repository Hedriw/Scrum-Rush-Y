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
	<a href=http://srv-peda.iut-acy.local/verony/M3104/Scrum/?r=connexion>Se connecter</a>
	<a href=http://srv-peda.iut-acy.local/verony/M3104/Scrum/?r=research>Rechercher une vidéo</a>
	

	
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
	</header>
	<nav>
	</nav>
	<section>	
