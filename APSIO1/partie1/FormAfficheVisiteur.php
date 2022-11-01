<!DOCTYPE html>
<html>
<head>
    <title>Liste des visiteurs</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./CSS/CSS.css">
</head>

<body>
    <?php
        include "mesFonctionsGenerales.php";
        $cnxBDD = connexion();
        $sql = "SELECT vis_matricule, vis_nom, vis_prenom, vis_dateEmbauche FROM visiteur;";
        $lignes = $cnxBDD->query($sql);
    ?>

    <!-- Entete du tableau -->
    <div class="container">
        <table class="table-fill">
            <!-- Header du Tableau -->
            <thead>
                <p class="bandeau">LISTE DES VISITEURS</p>
                <pre>
				    <h2>Ajouter<a href="FormVisiteur.php" style=" vertical-align: middle;"><img height="35" width="35" src="add.png"></a></h2>   
			    </pre>
                <tr>
                    <th class="colonne_tab">Nom</th>
                    <th class="colonne_tab">Prenom</th>
                    <th class="colonne_tab taille_date">Date</th>
                    <th class="element_tab col_suppr_modif">Supprimer</th>
                    <th class="element_tab col_suppr_modif">Modifier</th>
                </tr>
            </thead>
            <!--Body du Tableau -->
            <tbody class="table-fill">
                <?php
                    foreach ($lignes as $maLigne)
                    {
                        if(isset($maLigne['vis_nom'])){
                            $id = $maLigne['vis_matricule'];
                            $nom = $maLigne['vis_nom'];
                            $prenom= $maLigne['vis_prenom'];
                            $date= $maLigne['vis_dateEmbauche'];
                ?>
                            <tr>
                                <td class="nom" class="element_tab"><?php echo $nom ?></td>
                                <td class="prenom" class="element_tab"><?php echo $prenom ?></td>
                                <td class="date" class="element_tab"><?php echo $date ?></td>
                                <td class="supprimer" class="element_tab">
                                    <form action='deleteVisiteur.php' method='get'>
                                        <button type='submit'>
                                            <img class="taille_image" src='supr.png' height="35" width="35"/>
                                        </button>
                                        <input id='delete' name='BOdelete' type='hidden' value='<?php echo $id ?>'/>
                                    </form>
                                </td>
                                <td class="edit" class="element_tab">
                                    <form action='FormVisiteur.php' method='get'>
                                        <button type='submit'>
                                            <img src='modif.png' height="35" width="35"/>
                                        </button>
                                        <input id='editVisiteur' name='BOmodif' type='hidden' value='<?php echo $id ?>'/>
                                    </form>
                                </td>
                            </tr>   
                <?php
                        }else{continue;}
                    }
                    $cnxBDD->close();
                    $lignes->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>