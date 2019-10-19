<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');
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


    $requete = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, mdp, place) VALUES :nom, :prenom, :email, :mdp');
    $requete = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES "nom", "prenom", "email", "mdp"');
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':prenom', $prenom);
    $requete->bindParam(':email', $email);
    $requete->bindParam(':mdp', $mdp);

    $email = $_GET['email'];
    $mdp = $_GET['mdp'];
    $nom = $_GET['email'];
    $prenom = $_GET['prenom'];

    //$requete->execute();

    //$requete->execute(array(':nom'=>$_GET['nom'], ':prenom'=>$_GET['prenom'],':mdp'=>$_GET['mdp'], ':email'=>$_GET['email']));
    //$requete->execute(array($nom, $prenom, $email, $mdp));

    $requete = $bdd->prepare('INSERT INTO test (test) VALUES :test');
    $requete->bindParam(':test', $test);
    $test = 10;
    $requete->execute();



  ?>
  
  <p> 
    
    Prénom : <?php echo $nom; ?> <br>
    Nom : <?php echo $prenom; ?> <br>
    Mot de passe : <?php echo $mdp; ?> <br>
    Email : <?php echo $email ?> <br/>
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
