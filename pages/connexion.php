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
  <link rel="stylesheet" href="./css/PPE.css">
  <title>Parking</title>
</head>
<body>
  <?php

    $email = $_GET['email']; $mdp = $_GET['mdp'];

    $requete = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, mdp)
     VALUES :nom, :prenom, :mdp');
    $requete->execute(array(':nom'=>$_GET['lname'], ':prenom'=>$_GET['fname'],':mdp'=>$_GET['mdp']));


  ?>
  <p> First name : <?php echo $fname; ?> <br>
    Last name : <?php echo $lname; ?> <br>
    Password : <?php echo $mdp; ?> <br>
  </p>

  <?php
  /* echo '<script language="Javascript">
	<!--
	document.location.replace("PPE.php");
	// -->
	</script>';
  */
  ?>

</body>
</html>
