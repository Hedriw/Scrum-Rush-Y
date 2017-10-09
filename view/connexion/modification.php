<h2>Mes coordonnées</h2>
<form action="?r=connexion/modification" method="post">
<?php
// Utilisation de strval alors que $data["user"]->nomattribut est un string car empty() renvoie true sinon
?>
<label>Pseudo</label> : <input id="ACH_PSEUDO" name="pseudo" placeholder="Pseudo" value="<?php if(!empty(strval($data["user"]->ach_pseudo))){echo $data["user"]->ach_pseudo;} ?>" required />
</br>
</br>
<input type="radio" id="ACH_CIVILITE" name="genre" value="M."required <?php if(!empty(strval($data["user"]->ach_civilite))&&$data["user"]->ach_civilite=="M."){echo "checked";} ?> > <label>M</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mme."<?php if(!empty(strval($data["user"]->ach_civilite))&&$data["user"]->ach_civilite=="Mme."){echo "checked";} ?>> <label>Mme</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mlle."<?php if(!empty(strval($data["user"]->ach_civilite))&&$data["user"]->ach_civilite=="Mlle."){echo "checked";} ?>> <label>Mlle</label>
</br>
</br>
<label>Nom</label> : <input id="ACH_NOM" name="nom" placeholder="Nom" value="<?php if(!empty(strval($data["user"]->ach_nom))){echo $data["user"]->ach_nom;} ?>" required />
<label>Prenom</label> : <input id="ACH_PRENOM" name="prenom" placeholder="Prenom" required  value="<?php if(!empty(strval($data["user"]->ach_prenom))){echo $data["user"]->ach_prenom;} ?>"/>
</br>
</br>
<label>Email</label> : <input type="email" id="ACH_MEL" name="email" placeholder="Email" value="<?php if(!empty(strval($data["user"]->ach_mel))){echo $data["user"]->ach_mel;} ?>"required />
</br>
</br>
<label>Telephone Fixe</label> : <input id="ACH_TELFIXE" name="fixe" placeholder="Telephone"value="<?php if(!empty(strval($data["user"]->ach_telfixe))){echo $data["user"]->ach_telfixe;} ?>"/>
</br>
</br>
<label>Telephone portable</label> : <input id="ACH_TELPORTABLE" name="portable" placeholder="Portable"value="<?php if(!empty(strval($data["user"]->ach_telportable))){echo $data["user"]->ach_telportable;} ?>"/>
</br>
</br>
<label>Magasin :</label> <select name="magasin">
		<?php
		
		foreach(Magasin::findAll() as $magasin) 
		{
			if($data["user"]->mag_id->mag_id==$magasin->mag_id)
			{
				echo "<option value='".$magasin->mag_id."' selected>";
			}
			else
			{
				echo "<option value=".$magasin->mag_id.">";				
			}
			echo $magasin->mag_nom;
			echo "</option>";
		}
		
		?>
		</select>
<h2>Mon adresse (facultatif)</h2>

<label>Adresse</label> : <input id="ADR_RUE" name="adresse" placeholder="Adresse" value="<?php if(!empty(strval($data["adresse"]->adr_rue))){echo $data["adresse"]->adr_rue;} ?>"/>
</br>
</br>
<label>Complément d'adresse</label> : <input id="ADR_COMPLEMENTRUE" name="cr" placeholder="Complément d'adresse" value="<?php if(!empty(strval($data["adresse"]->adr_complementrue))){echo $data["adresse"]->adr_complementrue;} ?>"/>
</br>
</br>
<label>Code postal</label> : <input id="ADR_CP" name="cp" placeholder="Code Postal" value="<?php if(!empty(strval($data["adresse"]->adr_cp))){echo $data["adresse"]->adr_cp;} ?> "/>
<label>Ville</label> : <input id="ADR_VILLE" name="ville" placeholder="Ville"  value="<?php if(!empty(strval($data["adresse"]->adr_ville))){echo $data["adresse"]->adr_ville;} ?>"/>
</br>
</br>
<label>Pays :</label> <select name="pays">
<?php
		
		foreach(Pays::findAll() as $pays) 
		{
			if($data["adresse"]->pay_id->pay_id==$pays->pay_id)
			{
				echo "<option value='".$pays->pay_id."'selected>";
			}
			else
			{
				echo "<option value=".$pays->pay_id.">";
			}
			echo $pays->pay_nom;
			echo "</option>";
		}
		
?>
</select> 




</br>
</br>
<input name="submit" value="Modifier" type="submit"/>
<input name="submit"value="Annuler" type="submit"/>
</form>
<?php

// print_r($data["adresse"]);
if(!empty($data["error"]))
{
	echo $data["error"];
}
