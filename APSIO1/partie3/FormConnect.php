<!DOCTYPE html>
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
    
	/* On regarde si on est dans le cas d'une modification */
        $action = "Connection à votre espace personnel";

		/* Chercher dans la base les valeurs à modifier */
	?>
    <p><h1><?php echo $action; ?></h1></p>
       
        <form id="formulaire" action="connect.php" method="GET">
            <div>
                <label for="login">Login : </label>
                <input type="text" class='form' id="login" name="login" value= ""/>
            </div>
            <br>
            <div>
                <label for="mdp">Mot de Passe : </label>
                <input type="text" class='form' id="mdp" name="mdp" value= ""/>
            </div>
            <br>
            <div>
                <input type="submit" value="connexion">
            </div>
        </form>
    </body>
</html>