<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe-parking;charset=utf8', 'root', '');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="Description" content="Put your description here.">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <title>Parking</title>
</head>
<body>
  <?php

    $fname = $_GET['fname']; $lname = $_GET['lname']; $password = $_GET['password'];

    $requete = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, mdp) VALUES :nom, :prenom, :password');
    $resultat = $requete->execute(array(':nom'=>$_GET['lname'], ':prenom'=>$_GET['fname'],':password'=>$_GET['password']));

  ?>
  <p> First name : <?php echo $fname; ?> <br>
    Last name : <?php echo $lname; ?> <br>
    Password : <?php echo $password; ?> <br>
  </p>

</body>
</html>
