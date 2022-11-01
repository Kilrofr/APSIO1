<?php
	include('mesFonctionsGenerales.php');
    $cnxBDD = connexion();
    $id = $_GET['id'];
    $sql="DELETE FROM fichefrais WHERE id='$id';";
    $result = $cnxBDD->query($sql);
    $sql="DELETE FROM lignefraisforfait WHERE idFicheFrais='$id';";
    $result = $cnxBDD->query($sql);
    header('Location: Liste_FicheFrais.php');
?>