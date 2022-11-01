<?php 

// connexion à la base
include "mesFonctionsGenerales.php";
$cnxBDD = connexion();

//Infos du visiteur
$id = $_GET['id']; 				// vis_matricule
$nom = $_GET['nom']; 			// vis_nom
$prenom = $_GET['prenom']; 		// vis_prenom
$adresse = $_GET['adresse']; 	// vis_adresse
$codep = $_GET['codecp']; 		// vis_cp
$ville = $_GET['ville']; 		// vis_ville
$date = $_GET['date']; 			// vis_dateEmbauche

$sql = "UPDATE visiteur
		SET vis_nom = \"$nom\",
			vis_prenom = \"$prenom\",
			vis_adresse =\"$adresse\",
			vis_cp =\"$codep\",
			vis_ville =\"$ville\",
			vis_dateEmbauche =\"$date\"
		WHERE vis_matricule = \"$id\"";

$result = $cnxBDD->query($sql);

// Fermer la connexion MYSQL
$cnxBDD->close();

if ($result){
	$_SESSION["Modif"] = "<font color=green>Modification realisee</font>";
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
} else {
	$_SESSION["Error"] = "<font color=red>Erreur</font>";
	echo "<meta http-equiv='refresh' content='0;url=FormVisiteur.php?BOmodif=".$id."'>";
}

?>