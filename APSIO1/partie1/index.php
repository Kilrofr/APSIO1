<!DOCTYPE html>
<html>
    <head lang=fr>
       <meta charset="utf-8">
       <title> Référentiel des contacts </title>
     <head>
    <body>
        <div>
            <?php 
                if ( isset($_REQUEST['page']) ) 
                    {$maPage = $_REQUEST['page'];}
                else
                    {$maPage = "R";}
                                
		        switch($maPage) {
			        case 'C':{ include "../Generateur/remplirMedical.php?action=Ajout"; break; }
			        case 'R':{ include "./FormAfficheVisiteur.php"; break;  }
                    case 'U':{ include "../Generateur/remplirMedical.php?action=Modif"; break;  }
                    case 'D':{ include "./DeleteVisiteur.php"; break;  }
			    }
	        ?>
        </div>
        <div style="display: grid; grid-template-columns: 0.7fr 0.2fr; grid-template-rows: 1fr; background-color: #82A4C1; color: #fff;">
        <pre>
            <h2>Déconnexion <a href="../partie3/FormConnect.php?"><img style= " filter: invert(92%); width: 24px; height: 24px;" src="deconnect.svg"></a></h2>
        </pre>
        </div>
    </body>
</html>