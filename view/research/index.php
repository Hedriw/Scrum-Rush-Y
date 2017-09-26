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
print_r($data);
