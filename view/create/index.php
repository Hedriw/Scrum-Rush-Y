<h2>Mes coordonnées</h2>
<form action="?r=create/add" method="post">

<label>Pseudo</label> : <input id="ACH_PSEUDO" name="pseudo" placeholder="Pseudo" value='<?php if(!empty($data["pseudo"])){echo $data["pseudo"];} ?>' required />
<label>Mot de passe</label> : <input type="password" id="ACH_MOTPASSE" name="mdp" placeholder="Mot de passe" required />
</br>
</br>
<input type="radio" id="ACH_CIVILITE" name="genre" value="M."required <?php if(!empty($data["genre"])&&$data["genre"]=="M."){echo "checked";} ?> > <label>M</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mme."<?php if(!empty($data["genre"])&&$data["genre"]=="Mme."){echo "checked";} ?>> <label>Mme</label>
<input type="radio" id="ACH_CIVILITE" name="genre" value="Mlle."<?php if(!empty($data["genre"])&&$data["genre"]=="Mlle."){echo "checked";} ?>> <label>Mlle</label>
</br>
</br>
<label>Nom</label> : <input id="ACH_NOM" name="nom" placeholder="Nom" value='<?php if(!empty($data["nom"])){echo $data["nom"];} ?>' required />
<label>Prenom</label> : <input id="ACH_PRENOM" name="prenom" placeholder="Prenom" required  value='<?php if(!empty($data["prenom"])){echo $data["prenom"];} ?>'/>
</br>
</br>
<label>Email</label> : <input type="email" id="ACH_MEL" name="email" placeholder="Email" value='<?php if(!empty($data["email"])){echo $data["email"];} ?>'required />
</br>
</br>
<label>Telephone Fixe</label> : <input id="ACH_TELFIXE" name="fixe" placeholder="Telephone"value='<?php if(!empty($data["fixe"])){echo $data["fixe"];} ?>'/>
</br>
</br>
<label>Telephone portable</label> : <input id="ACH_TELPORTABLE" name="portable" placeholder="Portable"value='<?php if(!empty($data["portable"])){echo $data["portable"];} ?>'/>
</br>
</br>
<label>Magasin :</label> <select name='magasin'>
		<?php
		
		foreach(Magasin::findAll() as $magasin) 
		{
			if($data["magasin"]==$magasin->mag_id)
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

<label>Adresse</label> : <input id="ADR_RUE" name="adresse" placeholder="Adresse" value='<?php if(!empty($data["adresse"])){echo $data["adresse"];} ?>'/>
</br>
</br>
<label>Complément d'adresse</label> : <input id="ADR_COMPLEMENTRUE" name="cr" placeholder="Complément d'adresse" value='<?php if(!empty($data["cr"])){echo $data["cr"];} ?>'/>
</br>
</br>
<label>Code postal</label> : <input id="ADR_CP" name="cp" placeholder="Code Postal" value='<?php if(!empty($data["cp"])){echo $data["cp"];} ?> '/>
<label>Ville</label> : <input id="ADR_VILLE" name="ville" placeholder="Ville"  value='<?php if(!empty($data["ville"])){echo $data["ville"];} ?>'/>
</br>
</br>
<label>Pays :</label> <select name='pays'>
<?php
		
		foreach(Pays::findAll() as $pays) 
		{
			if($data["pays"]==$pays->pay_id)
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
<input value="Inscription" type="submit"/>
</form>
<?php
	echo "</br>";
	echo $data["error"];
	echo "</br>";