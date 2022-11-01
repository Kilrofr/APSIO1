<!DOCTYPE html>
<?php
    include('mesFonctionsGenerales.php');
    $cnxBDD = connexion();
    $idVisiteur=$_GET['idVisiteur'];
    $get_data="SELECT vis_nom, vis_prenom FROM visiteur WHERE vis_matricule ='$idVisiteur';";
    $get_data=$cnxBDD -> query($get_data);
    $Visiteur=$get_data -> fetch_assoc();
    $nom=$Visiteur['vis_nom'];
    $prenom=$Visiteur['vis_prenom'];
?>
<head>
    <meta charset="utf-8">
    <link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="entete">
        <p>Gestion des Frais</p>
        <img src="images/gsb.png"/>
    </div>  
	<?php
        /* On regarde si on est dans le cas d'une modification */
        $monTraitement = "update.php";		/* Traitement SQL à appeler après la FORM */
        $action = "Modification d'une fiche de frais";

        /* Chercher dans la base les valeurs à modifier */
        $cnxBDD = connexion();
        $nuitee=0;
        $repas=0;
        $vehicule='essence';
        $kilometre=0;
        $etape=0;
        $get_data="SELECT mois, annee, montantValide, idEtat, idForfait, quantite FROM fichefrais INNER JOIN lignefraisforfait ON lignefraisforfait.idFicheFrais=fichefrais.id WHERE id =".$_GET['id'].";";
        $get_data=$cnxBDD -> query($get_data);
        while ($elements=$get_data -> fetch_assoc()) 
        {      
            switch ($elements['idForfait']){
                case 'NUI':
                    $nuitee=$elements['quantite'];
                    break;
                case 'REP':
                    $repas=$elements['quantite'];
                    break;
                /*case 'ETP':
                    $etape=$elements['quantite'];
                    break;    
                case 'K6E':
                    $kilometre=$elements['quantite'];
                    $vehicule='essence';
                    break;
                case 'K6D':
                    $kilometre=$elements['quantite'];
                    $vehicule='diesel';
                    break;*/
            }
            $montant=$elements['montantValide'];
            if (strlen($elements['mois'])<2){$mois='0'.$elements['mois'];}else{$mois=$elements['mois'];}
            $annee=$elements['annee'];
        }
	?>
	        
    <div class="fond">
    <div>
        <p class="Mois_Annee">Mois (2 chiffres):<input class="MoisAnneetxt" type="text" id="Mois" name="Mois" value= "<?php echo $mois; ?>"/>  Année (4 chiffres):<input class="MoisAnneetxt" type="text" id="Anne" name="Anne" value= "<?php echo $annee; ?>"/></p>
        <h3>PERIODE <br/>D'ENGAGEMENT:</h3>
    </div>
    <p><h1><?php echo $action; ?></h1></p>
        
    <form id="formulaire" action="<?php echo $monTraitement; ?>" method="GET">
        <div>
            <input type="hidden" id="idFiche" name="idFiche" value= "<?php echo $_GET['id']; ?>"/>
        </div>
        <div>
            <input type="hidden" id="matricule" name="matricule" value= "<?php echo $_GET['idVisiteur']; ?>"/>
        </div>
        <div>
            <input type="hidden" id="montant" name="montant" value= "<?php echo $montant; ?>"/>
        </div>
        <br>
        <div>
            <label for="nuitee">Nombre Nuitee : </label>
            <input class="form" type="text" id="nuitee" name="nuitee" value= "<?php echo $nuitee; ?>"/>
        </div>
        <br>
        <div>
            <label for="repas">Nombre Repas : </label>
            <input class="form" type="text" id="repas" name="repas" value= "<?php echo $repas; ?>"/>
        </div>
        <br>
        <div>
            <input type="submit" value="Soumettre la requête">
        </div>
    </form>
    <div style="display: grid; grid-template-columns: 0.7fr 0.2fr; grid-template-rows: 1fr;">
        <pre>
            <h2>Retour <a href="Liste_FicheFrais.php?"><img class="change-my-color" src="images/return.svg"></a></h2>
        </pre>
    </div>
</body>
</html>