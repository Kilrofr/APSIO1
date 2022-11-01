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
    $id=$_GET['idFiche'];


    $montant = $nuitee*80+$repas*29;
    //Execution de la requête

    $update_data = "UPDATE fichefrais SET montantValide ='".$montant."' , dateModif='".$date."', mois ='".$mois."' , annee ='".$annee."'  WHERE id='".$id."';";
    $udate_data=$cnxBDD -> query($update_data);

    $del_data="DELETE FROM lignefraisforfait WHERE idFicheFrais='".$id."';";
    $del_data=$cnxBDD -> query($del_data);
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