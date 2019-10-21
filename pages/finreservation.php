<?php

session_start();

echo $_SESSION['login'];
echo "<br/>";
echo $_SESSION['idplace'];

$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');

if (!isset($_GET['idplace'])){
$requete2=$bdd->prepare('UPDATE place SET libre = 0 WHERE idplace ='.$_SESSION['idplace']);
$requete2->execute();
}
else {
$requete3=$bdd->prepare('UPDATE place SET libre = 0 WHERE idplace ='.$_GET['idplace']);
$requete3->execute();
}

if (isset($_GET['fin'])){
    echo '<script language="Javascript">
    <!--
    document.location.replace("deconnexion.php");
    // -->
    </script>';
}

else {
    echo '<script language="Javascript">
      <!--
      document.location.replace("connecte.php");
      // -->
      </script>';
}
