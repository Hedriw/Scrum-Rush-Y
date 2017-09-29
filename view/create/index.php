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

<h2>Mon adresse (facultatif)</h2>

<label>Adresse</label> : <input id="ADR_RUE" name="adresse" placeholder="Adresse" />
</br>
</br>
<label>Complément d'adresse</label> : <input id="ADR_COMPLEMENTRUE" name="cr" placeholder="Complément d'adresse" />
</br>
</br>
<label>Code postal</label> : <input id="ADR_CP" name="cp" placeholder="Code Postal" required />
<label>Ville</label> : <input id="ADR_VILLE" name="ville" placeholder="Ville" required />
</br>
</br>
<label>Pays :</label> <select name='pays'>
<?php
		
		foreach(Pays::findAll() as $pays) {
			echo "<option value=".$pays->pay_id.">";
				echo $pays->pay_nom;
			echo "</option>";
		}
		
?>
		</select> 

</br>
</br>
<input value="Inscription" type="submit"/>
</form>
<?php
	echo "</br>";
	echo $data;
	echo "</br>";
?>