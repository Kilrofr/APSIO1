<!doctype html>
    <head>
        <meta charset="utf-8">
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="entete">
            <p>Suivi de remboursement des frais</p>
            <img src="images/gsb.png"/>
        </div>
        <?php
            include('mesFonctionsGenerales.php');
            $cnxBDD = connexion();
            //-----Déclarations des variables-----//

            $nuitee=0;
            $repas=0;
            $id = $_GET['id'];
            $get_data="SELECT idVisiteur FROM fichefrais WHERE id ='$id'";
            $get_data=$cnxBDD -> query($get_data);
            $elements=$get_data -> fetch_assoc();
            $id_user=$elements['idVisiteur'];
            $get_data="SELECT vis_nom,vis_prenom FROM visiteur WHERE vis_matricule ='$id_user'";
            $get_data=$cnxBDD -> query($get_data);
            $elements=$get_data -> fetch_assoc();
            $nom=$elements['vis_nom'];
            $prenom=$elements['vis_prenom'];

            $get_data="SELECT mois, annee FROM fichefrais WHERE id = $id";
            $get_data=$cnxBDD -> query($get_data);
            $elements=$get_data -> fetch_assoc();
            if (strlen($elements['mois'])<2){$mois='0'.$elements['mois'];}else{$mois=$elements['mois'];}
            $annee=$elements['annee'];
        ?>
        <div class='entete-display'>
            <h2>Fiche de frais de <?php echo $nom." ".$prenom;?></h2>
        </div>
        <table>
            <th>
                <h1><pre>Periode         </pre></h1>
            </th>
            <td class="bord">
            <p class="MoiAnn">Mois/Année :
            <td class="Mois_Annee-case"><?php echo $mois ?></td>     <td class="Mois_Annee-case"><?php echo $annee ?> </td></p>
            </td>
        </table>
        <table border="1px" cellpadding="10px" class="table_style">
            <thead>
                <!-- En-tête du tableau -->
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Repas Midi</th>
                    <th>Nuitée</th>
                    <th>Situation</th>
                    <th>Date d'opération</th>
                    <th>Remboursement</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $get_data="SELECT dateModif, montantValide, idEtat FROM fichefrais WHERE id = $id";
                    $get_data=$cnxBDD -> query($get_data);
                    $elements=$get_data -> fetch_assoc();
                    $remboursement=$elements['montantValide'];
                    $date=$elements['dateModif'];
                    switch ($elements['idEtat']){
                        case 'CR':
                            $etat='Fiche Créée';
                            break;
                        case 'RB':
                            $etat='Remboursée';
                            break;
                        case 'CL':
                            $repas='Cloturée';
                            break;
                    }
                    $get_data="SELECT idForfait, quantite FROM lignefraisforfait WHERE idFicheFrais = $id";
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
                    }
                    
                    
                ?> 
                <tr>
                    <th><?php echo $nom;?></th>
                    <th><?php echo $prenom;?></th>
                    <th><?php echo $repas;?></th>
                    <th><?php echo $nuitee;?></th>
                    <th><?php echo $etat;?></th>
                    <th><?php echo $date;?></th>
                    <th><?php echo $remboursement." €";?></th>
                </tr> 
            </tbody>
        </table>
        <div style="display: grid; grid-template-columns: 0.7fr 0.2fr; grid-template-rows: 1fr;">
            <pre>
                <h2>Retour <a href="Liste_FicheFrais.php?"><img class="change-my-color" src="images/return.svg"></a></h2>
            </pre>
        </div>  
    </body>
</html>
    