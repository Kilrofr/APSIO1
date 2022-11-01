<?php
    include('mesFonctionsGenerales.php');
    $cnxBDD = connexion();
    $idVisiteur=$_GET['login'];
    $get_data="SELECT mdp FROM visiteur WHERE vis_matricule ='$idVisiteur';";
    $get_data=$cnxBDD -> query($get_data);
    $Visiteur=$get_data -> fetch_assoc();
    $mdpconnection=$_GET['mdp'];
    $mdp=$Visiteur['mdp'];
    
    if(isset($Visiteur['mdp'])){
        if($mdp==$mdpconnection){
            if($idVisiteur=='ROOT'){
                header('Location: ../partie1/index.php');
            }
            else {header('Location: ../partie2/Liste_FicheFrais.php');}
        }
        else {header('Location: FormConnectErreur.php');}
    }
    else {header('Location: FormConnectErreur.php');}
?>
