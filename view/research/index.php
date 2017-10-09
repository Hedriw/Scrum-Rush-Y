<form action="index.php">
<input type="hidden" name="r" id="r" value="research"></br>

<input class='real' input type="radio" name="typesearch" id="realisateur" value="realisateur" <?php if(!empty($data["typesearch"])&&$data["typesearch"]=="realisateur"){echo "checked";} ?>>
<label for="realisateur">Réalisateur</label>
<input class='acteur' input type="radio" name="typesearch" id="acteur" value="acteur" <?php if(!empty($data["typesearch"])&&$data["typesearch"]=="acteur"){echo "checked";} ?>>
<label for="acteur">Acteur </label>
<input class='classm' input type="radio" name="typesearch" id="classement" value="classement" <?php if(!empty($data["typesearch"])&&$data["typesearch"]=="classement"){echo "checked";} ?>>
<label for="classement">Classement </label><br>
<div class='rech_cach'>
<label for="keyword">Mot clef :</label><br>
<input type="text" name="keyword" id="keyword" value='<?php if(!empty($data["keyword"])){echo $data["keyword"];} ?>'><br><br>
</div>
<div class='val_type_form'>
<label>Classement :</label> <select name='classement'>
		<?php
		
		foreach(Classement::findAll() as $classement) 
		{
			if($data["classement"]==$classement->cla_id)
			{
				echo "<option value='".$classement->cla_id."' selected>";
			}
			else
			{
				echo "<option value=".$classement->cla_id.">";				
			}			
			echo $classement->cla_nom;
			echo "</option>";
			
		}
		
		?>
</select> 
</div>
<input type="submit" value="Rechercher">
</form>
</br>

<?php
// print_r($data);
if(empty($data["error"])&&!empty($data))
{
	foreach($data["videos"] as $video )
	{
		echo "<fieldset>
			Titre : ".$video->vid_titre."
			</br>
			</br>
			Duree : ".$video->vid_duree."
			</br>
			</br>
			Realisateur : ".$video->rea_id->rea_nom."
			</br>
			</br>
			Synopsis : ".$video->vid_synopsis."
			</br>
			</br>
			Format : ".$video->for_id->for_libelle."
			</br>
			</br>
			Prix TTC : ".$video->vid_prixttc." €
			<a href=http://srv-tpinfo/G246/Scrum-Rush-Y/?r=consulte&id=".$video->vid_id." class='button'>Consulter la vidéo</a>
		</fieldset>
		</br>";
		
	}
}
else
{

	echo $data["error"];
}

