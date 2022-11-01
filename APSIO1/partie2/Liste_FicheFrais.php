<!doctype html>
	<?php
		include('mesFonctionsGenerales.php');
		$cnxBDD = connexion();
		//$idVisiteur=$_GET['idVisiteur'];
		$idVisiteur='FJAC';
		$get_data="SELECT vis_nom, vis_prenom FROM visiteur WHERE vis_matricule ='$idVisiteur';";
		$get_data=$cnxBDD -> query($get_data);
		$Visiteur=$get_data -> fetch_assoc();
		$Nom=$Visiteur['vis_nom'];
		$Prenom=$Visiteur['vis_prenom'];
	?>
	<head>
		<meta charset="utf-8">
		<title>Tableau</title>
		<link href="css/index.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div class='entete-display'>
			<h2>Bienvenue <?php echo $Prenom.' '.$Nom;?>, voici vos fiches de frais.</h2>
		</div>
		<div class="entête" style="display: grid; grid-template-columns: 0.7fr 0.2fr; grid-template-rows: 1fr;">
			<pre>
				<h2>Ajouter<a href="FormFicheInsert.php?idVisiteur=<?php echo $idVisiteur;?>" style=" vertical-align: middle;"><img class="change-my-color" src="images/add.svg"></a></h2>   
			</pre>

			<pre>
				<h2>Hors Forfait<a href="horsforfait.php?idVisiteur=<?php echo $idVisiteur;?>" style=" vertical-align: middle;"><img class="change-my-color" src="images/add.svg"></a></h2>   
			</pre>
		</div>
		<table border="1px" cellpadding="10px" class="table_style">
			<thead>
				<!-- En-tête du tableau -->
				<tr>
				<th>Date</th>
				<th>Montant</th>
				<th>Etat</th>
				<th>Supprimer</th>
				<th>Modifier</th>
				<th>Voir</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$get_data="SELECT mois, annee, montantValide, idEtat,id FROM fichefrais WHERE idVisiteur ='$idVisiteur';";
				$get_data=$cnxBDD -> query($get_data);
				while ($elements=$get_data -> fetch_assoc()) 
				{      
				?>

				<tr>
				<th><?php 
				if (strlen($elements['mois'])<2){echo '0'.$elements['mois'];}else{echo $elements['mois'];}echo '/'.$elements['annee'];?></th>
				<th><?php echo $elements['montantValide'].' €';?></th>
				<th><?php  switch ($elements['idEtat']){
							case 'CR':
							$etat='Fiche Créée';
								break;
							case 'RB':
								$etat='Remboursée';
								break;
							case 'CL':
								$repas='Cloturée';
								break;
						}echo $etat;?></th>
				<th><a href="delete_fiche.php?id=<?php echo $elements['id']; ?>"><img class="change-my-color" src="images/delete.svg"></a></th>
				<th><a href="FormFicheUpdate.php?id=<?php echo $elements['id']; ?>&idVisiteur=<?php echo $idVisiteur;?>"><img class="change-my-color" src="images/settings.svg"></a></th>
				<th><a href="affiche_fiche.php?id=<?php echo $elements['id']; ?>"><img class="change-my-color" src="images/view.svg"></a></th>
				</tr>
				<?php
				}
				?>  
			</tbody>
		</table>
		<div class="entête" style="display: grid; grid-template-columns: 0.7fr 0.2fr; grid-template-rows: 1fr;">
			<pre>
				<h2>Déconnexion <a href="../partie3/FormConnect.php?" ><img style=" text-align: center;" class="change-my-color" src="images/deconnect.svg"></a></h2>
			</pre>
		</div>
	</body> 
</html>