<form action="index.php">
<input type="hidden" name="r" id="r" value="research"></br>

<input type="radio" name="typesearch" id="realisateur" value="realisateur">
<label for="realisateur">Réalisateur</label>
<input type="radio" name="typesearch" id="acteur" value="acteur">
<label for="acteur">Acteur </label><br>
<label for="keyword">Mot clef :</label><br>
<input type="text" name="keyword" id="keyword" ><br><br>
<input type="submit" value="Rechercher">
</form>
</br>

<?php
// print_r($data);
if(empty($data["error"])&&!empty($data))
{
	foreach($data as $video )
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
			Prix TTC : ".$video->vid_prixttc."
		</fieldset>
		</br>";
		
	}
}
else
{
	echo $data["error"];
}

