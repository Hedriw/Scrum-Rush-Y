	<form action="index.php" method="post">
	<input type="hidden" name="r" id="r" value="connexion"><br>
	<label for="id">Adresse Mail</label><br>
	<input type="text" name="id" id="id" ><br>
	<label for="mdp">Mot de Passe</label><br>
	<input type="password" name="mdp" id="mdp"><br>
	<input type="submit" value="Se connecter">
	</form>
	</br>
	<a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=create>Create an account</a>
<?php
	echo $data;
?>