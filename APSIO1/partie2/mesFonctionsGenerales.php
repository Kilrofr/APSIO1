<?php

function connexion(){
    $host = "localhost";
        $user = "root";
        $password = "password";
        $dbname = "gsb_frais";
        $port ="3307";

        $mysqli = new mysqli($host, $user, $password, $dbname, $port);
        if ($mysqli->connect_errno) {
            echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return($mysqli->connect_errno);
        } 
        //gestion des accents pour MySQL
       
        return $mysqli;
         

}
     
function erreurSQL() {
    global $cnxBDD;
    
    $err = mysql_errno($link) . ": " . mysql_error($cnxBDD). "\n";
    return $err;
}

function afficheErreur($sql, $erreur) {

	$uneChaine = "ERREUR SQL : ".date("j M Y - G:i:s.u --> ").$sql." : ($erreur) \r\n";

	ecritRequeteSQL($uneChaine);

	return "Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"].
	"</b>.<br />Dans le fichier : ".__FILE__.
	" a la ligne : ".__LINE__.
	"<br />".$erreur.
	"<br /><br /><b>REQUETE SQL : </b>$sql<br />";

}

function ecritRequeteSQL($uneChaine) {
	$handle=fopen("requete.sql","a");
	fwrite($handle,$uneChaine);
	fclose($handle);
}

function AfficheFiche($FicheID){
    global $cnxBDD;
    $get_Data="SELECT idForfait FROM lignefraisforfait WHERE idFicheFrais=$FicheID";
        $get_Data=$cnxBDD -> query($get_Data);
        $oui=$get_Data ->fetch_assoc();
        echo $oui["idForfait"];
}

?>


