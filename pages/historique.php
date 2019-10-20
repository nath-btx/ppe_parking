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
    <a href="connecte.php"> Retour </a>            

<?php
$idnum = $_SESSION['login'];
    $requete=$bdd->prepare('SELECT datetime, idplace FROM date WHERE idnum = '.$_SESSION['login'].' ORDER BY datetime DESC');
    $requete->execute();
    ?>
    <table>
        <tr>
            <th> Place</th>
            <th> Date </th>
        </tr>
<?php
while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr><td> <?php echo $row['idplace']?> </td>
        <td> <?php echo $row['datetime'];?></td>         
    </tr>
<?php   }   ?>
</table>
    
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
