<?php 

    // connexion à la base
    include "mesFonctionsGenerales.php";
    $cnxBDD = connexion();


    //Infos du contact
    $id = $_GET['id']; 				// vis_matricule
    $nom = $_GET['nom']; 			// vis_nom
    $prenom = $_GET['prenom']; 		// vis_prenom
    $adresse = $_GET['adresse']; 	// vis_adresse
    $cp = $_GET['codecp']; 		// vis_cp
    $ville = $_GET['ville']; 		// vis_ville
    $date = $_GET['date']; 			// vis_dateEmbauche
    $id=strtoupper(substr($prenom,0,1).substr($nom,0,3));
    echo $id;


    //Execution de la requête
    $set_data = "INSERT INTO visiteur (vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_dateEmbauche, `mdp`) 
                 VALUES ('".$id."','".$nom."','".$prenom."','".$adresse."','".$cp."','".$ville."','".$date."','Password')";
    $set_data=$cnxBDD -> query($set_data);

    $cnxBDD->close();
            
    //Redirection en fonction du résultat de la requête
    header('Location: index.php');
?>