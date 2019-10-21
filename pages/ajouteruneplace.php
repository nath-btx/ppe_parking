<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');

$requete=$bdd->prepare('SELECT max(idplace) as maxplace FROM place');
$requete->execute();
$resultat = $requete->fetch();
$maxplace = $resultat['maxplace'] + 1;
echo $maxplace;

$requete2=$bdd->prepare('INSERT INTO place VALUES (:maxplace, 0)');
$array= array('maxplace' => $maxplace);
$requete2->execute($array);

$requete3=$bdd->prepare('INSERT INTO reserver VALUES (0, :maxplace, now())');
$array= array('maxplace' => $maxplace);
$requete3->execute($array);

echo '<script language="Javascript">
    <!--
    document.location.replace("ajouterplace.php");
    // -->
    </script>';
?>