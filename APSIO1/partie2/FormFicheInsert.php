<!DOCTYPE html>
    <?php
        include('mesFonctionsGenerales.php');
        $cnxBDD = connexion();
        //$idVisiteur=$_GET['idVisiteur'];
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
            /* Cas d'une insertion */
            $monTraitement = "insert.php";	/* Traitement SQL à appeler après la FORM */
            $action="Création d'un nouvelle fiche de frais";
            $mois = '';
            $annee = '';
            $montant = '';
            $nuitee = '';
            $repas = '';
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
                <label for="nuitee">Nombre Nuitee : </label>
                <input type="text" id="nuitee" name="nuitee" class="form" value= "<?php echo $nuitee; ?>"/>
            </div>
            <br>
            <div>
                <label for="repas">Nombre Repas : </label>
                <input type="text" id="repas" name="repas" class="form" value= "<?php echo $repas; ?>"/>
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