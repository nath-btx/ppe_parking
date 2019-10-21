<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');


$idplace = $_GET['idplace'];
echo $idplace;
$requete2=$bdd->prepare('DELETE FROM place WHERE idplace ='.$idplace);
$requete2->execute();

$requete3=$bdd->prepare('DELETE FROM reserver WHERE idplace ='.$idplace);
$requete3->execute();


echo '<script language="Javascript">
    <!--
    document.location.replace("supprimerplace.php");
    // -->
    </script>';

?>