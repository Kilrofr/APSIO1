<!DOCTYPE html>
<html>
<head>
<head>
	<title>Création de Visiteurs</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./CSS/CSS.css">
</head>

<body>
	<?php

	include "mesFonctionsGenerales.php";

	/* On regarde si on est dans le cas d'une modification */
	if (isset($_GET['BOmodif']))
		{
			$monTraitement = "updateVisiteur.php";		/* Traitement SQL à appeler après la FORM */
			$monAction = "Modif";

			/* Chercher dans la base les valeurs à modifier */
			$cnxBDD = connexion();

			$sql = "SELECT vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche
					FROM visiteur
					WHERE vis_matricule = '".$_GET['BOmodif']."';";
			//print_r($sql);

			$result = $cnxBDD->query($sql);
			$maLigne = $result->fetch_assoc(); // php 5
			
			$id = $maLigne['vis_matricule'];
			$nom = $maLigne['vis_nom'];
			$prenom = $maLigne['vis_prenom'];
			$adresse=  $maLigne['vis_adresse'];
			$codep = $maLigne['vis_cp'];
			$ville = $maLigne['vis_ville'];
			$date = $maLigne['vis_dateEmbauche'];
		}
	else
		{
			/* Cas d'une insertion */
			$monTraitement = "insert.php";	/* Traitement SQL à appeler après la FORM */
			$monAction = "Insert";

			$id = '';
			$nom = '';
			$prenom = '';
			$adresse = '';
			$codep = '';
			$ville= '';
			$date = '';
		}
	?>
	<div class="container_2">
		<form id="formulaire" action="<?php echo $monTraitement; ?>" method="GET">
			<div class="bloc1">
				<p class="bandeau bandeau2">VISITEUR</p>

				<input type="hidden" id="id" name="id"  value= "<?php echo $id; ?>" />

				<label class="label_visiteur">Nom :</label>
				<input type="text" id="nom" name="nom" class="input_visiteur" required value= "<?php echo $nom; ?>" />

				<br/>
				<br/>

				<label class="label_visiteur">Prenom :</label>
				<input type="text" id="prenom" name="prenom" class="input_visiteur" value= "<?php echo $prenom; ?>" required/>

				<br/>
				<br/>

				<label class="label_visiteur">Adresse :</label>
				<input type="text" id="adresse" name="adresse" class="input_visiteur" value= "<?php echo $adresse; ?>" style="width: 295px;" required/>

				<br/>
				<br/>

				<label class="label_visiteur">Code Postal :</label>
				<input type="text" id="codecp" name="codecp" class="input_visiteur" value= "<?php echo $codep; ?>" required/>
				
				<br/>
				<br/>

				<label class="label_visiteur">Ville :</label>
				<input type="text" id="ville" name="ville" class="input_visiteur" value= "<?php echo $ville; ?>" required/>

				<br/>
				<br/>

				<label class="label_visiteur">Date :</label>
				<input type="text" id="date" name="date" class="input_visiteur" value= "<?php echo $date; ?>" required/>

				<br/>
				<br/>

				<button class="bouton" name=<?php echo $monAction; ?> type="submit" value="Modifier" title=""><img src="valider.jfif" height="35" width="35"/> Valider</button>	

				<a href="index.php">
					<button class="bouton2"name="retour"type="button" value="Retour" title=""><img src="back.png" height="35" width="35"/> Retour</button>
				</a>
			</div>
		</form>
	</div>
</body>
</html>