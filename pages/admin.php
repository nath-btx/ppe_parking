<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');

    $requete=$bdd->prepare('UPDATE utilisateur SET admin = "1" WHERE idnum ='.$_GET['idnum']);
    $requete->execute();
echo '<script language="Javascript">
<!--
document.location.replace("pageadmin.php");
// -->
</script>';
?>
