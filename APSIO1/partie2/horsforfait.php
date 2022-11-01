<!DOCTYPE html>
    <?php
        include('mesFonctionsGenerales.php');
        $cnxBDD = connexion();
        session_start();
		//$idVisiteur=$_GET['idVisiteur'];
		$idVisiteur=$_SESSION['login'];
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
            /* Cas d'une insertion */
            $monTraitement = "insert.php";	/* Traitement SQL à appeler après la FORM */
            $action="Hors forfait";
            $mois = '';
            $annee = '';
            $montant = '';
            $date = '';
            $libelle = '';
            $montant ='';
        ?>
        <h1>Saisie</h1>
        <form id="formulaire" action="<?php echo $monTraitement; ?>" method="GET">
            <div>
                <p class="Mois_Annee">Mois (2 chiffres):<input class="MoisAnneetxt" type="text" id="mois" name="mois" value= "<?php echo $mois; ?>"/>  Année (4 chiffres):<input class="MoisAnneetxt" type="text" id="annee" name="annee" value= "<?php echo $annee; ?>"/></p>
                <h3>PERIODE <br/>D'ENGAGEMENT:</h3>
            </div>

            <p><h1><?php echo $action; ?></h1></p>


            <div>
                <input type="hidden" id="matricule" name="matricule" value= "<?php echo $_GET['idVisiteur']; ?>"/>
            </div>
            <div>
                <input type="hidden" id="montant" name="montant" value= "<?php echo $montant; ?>"/>
            </div>
            <br>
            <div>
                <label for="date">Date : </label>
                <input type="text" id="date" name="date" class="form" value= "<?php echo $date; ?>"/>
                
            </div>
            <br>
            <div>
                <label for="libelle">Libellé : </label>
                <input type="text" size="24" maxlenght="24" id="libelle" name="libelle" class="form" value= "<?php echo $libelle; ?>"/>
            </div>
            <br>
            <div> 
                <label for="montant">Montant : </label>
                <input type="text" id="montant" name="montant" class="form" value= "<?php echo $montant; ?>"/>
                
            </div>
            <br>
            <div>
                <input type="submit" value="Soumettre la requête">
                <input type="reset" value="Reset" />
            </div>
        </form>
        <div style="display: grid; grid-template-columns: 0.7fr 0.2fr; grid-template-rows: 1fr;">
            <pre>
                <h2>Retour <a href="Liste_FicheFrais.php?"><img class="change-my-color" src="images/return.svg"></a></h2>
            </pre>
        </div>
    </body>
</html>