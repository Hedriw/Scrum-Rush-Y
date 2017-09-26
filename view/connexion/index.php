	<form action="index.php">
	<input type="hidden" name="r" id="r" value="connexion"><br>
	<label for="id">Identifiant</label><br>
	<input type="text" name="id" id="id" ><br>
	<label for="mdp">Mot de Passe</label><br>
	<input type="text" name="mdp" id="mdp"><br>
	<input type="submit" value="Se connecter">
	</form>
	</br>
	<a href=http://srv-peda.iut-acy.local/duvety/M3104/Scrum/?r=create>Create an account</a>
<?php
	echo $data;
?>