<?php
session_start();
$idnum = $_GET['idnum'];
echo $idnum; echo "<br/>";

$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');
/*
$requete5=$bdd->prepare('UPDATE place, date SET libre = 0 WHERE place.idplace = date.idplace AND max(datetime) < DATE_SUB(now(),interval 1 hour)');
$requete5->execute();
*/
$requete=$bdd->prepare('SELECT idplace, libre FROM place WHERE libre = 0 ORDER BY RAND() LIMIT 1');
$requete->execute();
$resultat = $requete->fetch();
$idplace = $resultat['idplace'];
echo "id de la place : ";
echo $idplace;

$_SESSION['idplace'] = $idplace;

$requete2=$bdd->prepare('UPDATE utilisateur SET idplace = "'.$idplace.'" WHERE idnum ='.$idnum);
$requete2->execute();
$requete3=$bdd->prepare('UPDATE place SET libre = 1 WHERE idplace = '.$idplace);
$requete3->execute();
$requete4=$bdd->prepare('INSERT INTO date (datetime, idplace, idnum) VALUES (now(), :idplace, :idnum)');
$array = array(
    'idplace' => $idplace,
    'idnum' => $idnum);
$requete4->execute($array);


echo '<script language="Javascript">
<!--
document.location.replace("connecte.php");
// -->
</script>';