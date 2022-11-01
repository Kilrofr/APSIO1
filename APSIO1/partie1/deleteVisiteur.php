:   <?php 
	// connexion à la base
	include "mesFonctionsGenerales.php";
	$cnxBDD = connexion();


	//Recupération des information saisies
	//$id = trim($_GET['BOdelete']);
	$id = $_GET['BOdelete'];

	//Execution de la requête
	$sql = "DELETE FROM visiteur WHERE vis_matricule = '".$id."'";
	//$sql = "DELETE FROM visiteurmedical WHERE vis_matricule = \"$id\";";
	$result = $cnxBDD->query($sql);
	
	// Fermer la connexion MYSQL
	$cnxBDD->close();

	//Redirection en fonction du résultat de la requête
	if ($result){
		$_SESSION["Suppr"] = "<font color=green> Suppression realisee </font>";
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
	else{
		$_SESSION["PbSuppr"] = "<font color=red>Erreur</font>";
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>