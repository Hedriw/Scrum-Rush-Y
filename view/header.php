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
		echo '<form action="http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion">';
		echo '<input type="submit" value="Deconnexion" />';
		echo '</form>';
	}
	else
	{
		echo '<form action="http://srv-tpinfo/G246/Scrum-Rush-Y/?r=connexion">';
		echo '<input type="submit" value="Connexion" />';
		echo '</form>';
	}
	?>
	</br>


	

	<a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=research>Rechercher une vidéo</a>
	

	
	</header>
	<nav>
	</nav>
	<section>	
