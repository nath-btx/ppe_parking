<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');
session_start();
$requete2=$bdd->prepare('SELECT idplace FROM utilisateur WHERE idnum = "'.$_SESSION["login"].'"');
$requete2->execute();
$resultat2 = $requete2->fetch();
$idplace = $resultat2['idplace'];
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
$requete=$bdd->prepare('SELECT idnum, admin FROM utilisateur WHERE idnum = "'.$_SESSION["login"].'"');
$requete->execute();
$resultat = $requete->fetch();
$admin = $resultat['admin'];
if ($admin == 0){
    echo '<script language="Javascript">
    <!--
    document.location.replace("inscrit.html");
    // -->
    </script>';
}

else if ($admin == 1 || $admin == 2){
if ($idplace == 0) {
?>
            <a href="obtenirplace.php?idnum=<?php echo $_SESSION['login']; ?>"> Obtenir une place </a>

<?php }
else {
?>
    <p> Vous pouvez vous garer à la place numéro <?php echo $idplace; ?>. </p>
    <a href="finreservation.php"> Arrêter la réservation </a>
<?php
}
?>
            <a href="finreservation.php?fin=1"> Déconnexion </a>
<?php
}






if ($admin == 2) {
?>
<a href="./pageadmin.php"> Page admin </a>
    </main>
    <footer>
        Nathan &amp; Benjamin - ppe
    </footer>
</body>
</html>
<?php }}
else {
echo '<script language="Javascript">
<!--
document.location.replace("../index.html");
// -->
</script>';
echo "vous n\'êtes pas connectés";
}
?>
