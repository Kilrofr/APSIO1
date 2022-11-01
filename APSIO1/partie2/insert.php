<?php 

    // connexion à la base
    include "mesFonctionsGenerales.php";
    $cnxBDD = connexion();


    //Infos du contact
    $matricule = $_GET['matricule'];

    $nuitee = $_GET['nuitee'];
    $repas = $_GET['repas'];
    $date=date("Y-m-d");
    $mois=$_GET['mois'];
    $annee=$_GET['annee'];



    $montant = $nuitee*80+$repas*29;
    //Execution de la requête
    $set_data = "INSERT INTO fichefrais (idVisiteur,mois,annee,montantValide,dateModif,idEtat)
                 VALUES ('".$matricule."','".$mois."','".$annee."','".$montant."','".$date."','CR');";
    $set_data=$cnxBDD -> query($set_data);

    $get_data = "SELECT id FROM fichefrais WHERE idVisiteur='".$matricule."' AND (mois='".$mois."' AND (annee='".$annee."' AND montantValide='".$montant."'));";
    $get_data=$cnxBDD -> query($get_data);
    $id=$get_data -> fetch_assoc();
    $id=$id['id'];
    for ($i =0;$i<=1;$i++){
        switch ($i){
            case '0' : 
                if($repas!=0){
                    $idforfait="REP";
                    $quantite=$repas;
                    $set_data = "INSERT INTO lignefraisforfait (idFicheFrais,idForfait,quantite) 
                                 VALUES ('".$id."','".$idforfait."','".$quantite."');";
                    $set_data=$cnxBDD -> query($set_data);
                    } break;
            case '1' :
                if($nuitee!=0){
                    $idforfait="NUI";
                    $quantite=$nuitee;
                    $set_data = "INSERT INTO lignefraisforfait (idFicheFrais,idForfait,quantite)
                                 VALUES ('".$id."','".$idforfait."','".$quantite."');";
                    $set_data=$cnxBDD -> query($set_data);} break;
        }

    }
    // Fermer la connexion MYSQL
    $cnxBDD->close();
            
    //Redirection en fonction du résultat de la requête
    header('Location: Liste_FicheFrais.php');
?>