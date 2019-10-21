<?php
session_start();
$idnum = $_SESSION['login'];

$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');

$requete6=$bdd->prepare('UPDATE place, reserver SET libre = 0 WHERE place.idplace = reserver.idplace AND datetime < DATE_SUB(now(),interval 1 hour)');
$requete6->execute();


$requete=$bdd->prepare('SELECT idplace, libre FROM place WHERE libre = 0 ORDER BY RAND() LIMIT 1');
$requete->execute();
$resultat = $requete->fetch();


if (!is_null($resultat)){
$idplace = $resultat['idplace'];

$_SESSION['idplace'] = $idplace;

$requete3=$bdd->prepare('UPDATE place SET libre = 1 WHERE idplace = '.$idplace);
$requete3->execute();

$requete4=$bdd->prepare('INSERT INTO date (datetime, idplace, idnum) VALUES (now(), :idplace, :idnum)');
$array = array(
    'idplace' => $idplace,
    'idnum' => $idnum);
$requete4->execute($array);

$requete5=$bdd->prepare('UPDATE reserver SET datetime = now(), idnum = '.$idnum.' WHERE idplace = '.$idplace);
$requete5->execute();

$requete8=$bdd->prepare('UPDATE utilisateur SET file = 0 WHERE idnum = '.$idnum);
$requete8->execute();
}
else {
    $requete10=$bdd->prepare('SELECT max(file) from utilisateur');
    $requete10->execute();
    $resultat2=$requete10->fetch();
    $file = $resultat2['file'];

    $requete9=$bdd->prepare('UPDATE utilisateur SET file ='.$file.' WHERE idnum = '.$idnum);
    $requete9->execute();
}
echo '<script language="Javascript">
<!--
document.location.replace("connecte.php");
// -->
</script>';


