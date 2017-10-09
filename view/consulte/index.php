<?php 
// print_r($data);
if(!empty($data["videos"]))
{
	echo "<h1 class='midTitle'>La vidéo :</h1>";
		echo "<p class='vid'>
			<smallTitle class='titre'>".$data["videos"]->vid_titre."</smallTitle> 
			</br>
			</br>
			Duree : ".$data["videos"]->vid_duree."
			</br>
			</br>
			Realisateur : ".$data["videos"]->rea_id->rea_nom."
			</br>
			</br>
			Synopsis : ".$data["videos"]->vid_synopsis."
			</br>
			</br>
			Format : ".$data["videos"]->for_id->for_libelle."
			</br>
			</br>
			Prix TTC : ".$data["videos"]->vid_prixttc." €
			</br>
			</br>
			Date de parution : ".$data["videos"]->vid_dateparution."
			</br>
			</br>
			Public légal : ".$data["videos"]->vid_publiclegal."
			</br>
			</br>
			</br>
			</br>
		</p>
		</br>";
}
if(!empty($data["avis"]))
{
		echo "<h1 class='midTitle'>Les Avis :</h1>";
		foreach($data["avis"] as $avis)
		{
			echo "<fieldset class='avis'>
			<h2>".$avis->avi_titre."</h2>
			Note :".$avis->avi_note."
			</br>
			Commentaire : ".$avis->avi_detail."
			</br>
			Auteur : ".$avis->ach_id->ach_pseudo."
			</br>
			</br>
			Avis utile :
			</br>
			Oui :".$avis->avi_nbutileoui." Non : ".$avis->avi_nbutilenon."
			</br>
			</br>
			Date de publication : ".$avis->avi_date."
			</br>
			</fieldset>";
			
			// echo $avis->avi_id;
			echo "</br>";
		}

}
else
{
	echo $data["error"];
}