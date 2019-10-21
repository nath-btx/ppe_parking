<?php

session_start();


$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');

if (!isset($_GET['idplace'])){
$requete2=$bdd->prepare('UPDATE place SET libre = 0 WHERE idplace ='.$_SESSION['idplace']);
$requete2->execute();
}
else if (isset($_GET['idplace'])){
$requete3=$bdd->prepare('UPDATE place SET libre = 0 WHERE idplace ='.$_GET['idplace']);
$requete3->execute();

echo '<script language="Javascript">
<!--
document.location.replace("pageadmin.php");
// -->
</script>';
}

if (isset($_GET['fin'])){
    
    echo '<script language="Javascript">
    <!--
    document.location.replace("deconnexion.php");
    // -->
    </script>';
    
}
else if (!isset($_GET['fin'])){
    
    echo '<script language="Javascript">
      <!--
      document.location.replace("connecte.php");
      // -->
      </script>';
      
}
