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

<label>Pseudo</label> : <input id="ACH_PSEUDO" name="pseudo" placeholder="Pseudo"/>
<label>Mot de passe</label> : <input type="password" id="ACH_MOTPASSE" name="mdp" placeholder="Mot de passe"/>
</br>
</br>
<input type="radio" id="ACH_CIVILITE" name="genre" value="M"> <label>M</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mme"> <label>Mme</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mlle"> <label>Mlle</label>
</br>
</br>
<label>Nom</label> : <input id="ACH_NOM" name="nom" placeholder="Nom"/>
<label>Prenom</label> : <input id="ACH_PRENOM" name="prenom" placeholder="Prenom"/>
</br>
</br>
<label>Email</label> : <input id="ACH_MEL" name="email" placeholder="Email"/>
</br>
</br>

<h2>Mon adresse</h2>

<label>Adresse</label> : <input id="ADR_RUE" name="adresse" placeholder="Adresse"/>
</br>
</br>
<label>Complément d'adresse</label> : <input id="ADR_COMPLEMENTRUE" name="cr" placeholder="Complément d'adresse"/>
</br>
</br>
<label>Code postal</label> : <input id="ADR_CP" name="cp" placeholder="Code Postal"/>
<label>Ville</label> : <input id="ADR_VILLE" name="ville" placeholder="Ville"/>
</br>
</br>
<label>Telephon Fixe</label> : <input id="ACH_TELFIXE" name="fixe" placeholder="Telephone"/>
</br>
</br>
<label>Telephone portable</label> : <input id="ACH_TELPORTABLE" name="portable" placeholder="Portable"/>
</br>
</br>
<label>Magasin :</label> <input id="ACH_MAG_ID" name="magasin" placeholder="Magasin"/> 

<input value="Inscription" type="submit"/>
</form>

</body>
</html>