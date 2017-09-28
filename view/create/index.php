<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<header>
	<h1>Inscription</h1>
</header>
<h2>Mes coordonnées</h2>

<form action="?r=create/add" method="post">

<label>Pseudo</label> : <input id="ACH_PSEUDO" name="pseudo" placeholder="Pseudo" required />
<label>Mot de passe</label> : <input type="password" id="ACH_MOTPASSE" name="mdp" placeholder="Mot de passe" required />
</br>
</br>
<input type="radio" id="ACH_CIVILITE" name="genre" value="M."required > <label>M</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mme."> <label>Mme</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mlle."> <label>Mlle</label>
</br>
</br>
<label>Nom</label> : <input id="ACH_NOM" name="nom" placeholder="Nom" required />
<label>Prenom</label> : <input id="ACH_PRENOM" name="prenom" placeholder="Prenom" required />
</br>
</br>
<label>Email</label> : <input type="email" id="ACH_MEL" name="email" placeholder="Email" required />
</br>
</br>

<h2>Mon adresse</h2>

<label>Adresse</label> : <input id="ADR_RUE" name="adresse" placeholder="Adresse" required />
</br>
</br>
<label>Complément d'adresse</label> : <input id="ADR_COMPLEMENTRUE" name="cr" placeholder="Complément d'adresse" />
</br>
</br>
<label>Code postal</label> : <input id="ADR_CP" name="cp" placeholder="Code Postal" required />
<label>Ville</label> : <input id="ADR_VILLE" name="ville" placeholder="Ville" required />
</br>
</br>
<label>Telephone Fixe</label> : <input id="ACH_TELFIXE" name="fixe" placeholder="Telephone"/>
</br>
</br>
<label>Telephone portable</label> : <input id="ACH_TELPORTABLE" name="portable" placeholder="Portable"/>
</br>
</br>
<label>Magasin :</label> <select name='magasin'>
		<?php
		
		foreach(Magasin::findAll() as $magasin) {
			echo "<option value=".$magasin->mag_id.">";
				echo $magasin->mag_nom;
			echo "</option>";
		}
		
		?>
		</select> 


<input value="Inscription" type="submit"/>
</form>

</body>
</html>