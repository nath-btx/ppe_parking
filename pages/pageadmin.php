<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');
session_start();
if ($_SESSION["login"]){
?>
<!DOCTYPE html>
<html lang="fr" dir = "ltr">
<head>
        <meta charset="UTF-8">
        <meta name="Description" content="Parking">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="icon" type="image/png" href = "../asset/logo.png">
        <link rel="stylesheet" href="../css/style.css">
        <title> Parking </title>
</head>
<body>
    <header>
        <h1> Parking </h1> 
    </header>
    <main>
<?php
    $requete=$bdd->prepare('SELECT idnum, nom, prenom, email, admin FROM utilisateur WHERE admin = 0');
    $requete->execute();
//$resultat = $requete->fetch();

?>
<a href="ajouterplace.php"> Ajouter place </a>
<a href="supprimerplace.php"> Supprimer place </a>
<?php
$requete3=$bdd->prepare('SELECT count(*) as maxplace FROM place');
$requete3->execute();
$resultat = $requete3->fetch();
$maxplace = $resultat['maxplace'];
?>
<p> Il y a au total <?php echo $maxplace;?> places </p> 


    <table>
        <caption> Comptes à vérifier </caption>
        <tr>
            <th> Nom    </th>
            <th> Prénom </th>
            <th> E-mail </th>
            <th> &#9776;       </th>
        </tr>
<?php
while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
?>

    <tr><td> <?php echo $row['nom']?> </td>
        <td> <?php echo $row['prenom'];?></td> 
        <td> <?php echo $row['email'];?></td> 
        <td> <a href="admin.php?idnum=<?php echo $row['idnum']; ?>"> Vérifier. </a> </td> 
        
    </tr>
<?php   }   ?>
    </table>
    <?php
    $requete=$bdd->prepare('SELECT reserver.idnum, nom, prenom,email, place.idplace FROM utilisateur, place, reserver
                            WHERE place.idplace = reserver.idplace AND utilisateur.idnum = reserver.idnum AND libre = 1');
    $requete->execute();
//$resultat = $requete->fetch();

?>
    <table>
        <caption> Réservation en cours </caption>
        <tr>
            <th> Id    </th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> E-mail </th>
            <th> Place  </th>
            <th> &#9776;</th>
        </tr>
<?php
while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
?>

    <tr><td> <?php echo $row['idnum']?> </td>
        <td> <?php echo $row['nom'];?></td>
        <td> <?php echo $row['prenom'];?></td> 
        <td> <?php echo $row['email'];?></td>  
        <td> <?php echo $row['idplace'];?></td> 
        <td> <a href="finreservation.php?idplace=<?php echo $row['idplace']; ?>"> Annuler réservation. </a> </td> 
        
    </tr>
<?php   }   ?>
    </table>
    <a href="connecte.php"> Retour </a>            
    </main>
    <footer>
        Nathan &amp; Benjamin - ppe
    </footer>
    
</body>
</html>
<?php
}
else {
    echo "c\'est pas bon";
    echo '<script language="Javascript">
    <!--
    document.location.replace("../index.html");
    // -->
    </script>';
}
?>
