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
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['email'];
    $prenom = $_POST['prenom'];

    $requete=$bdd->prepare('SELECT * FROM utilisateur where email = ?');
    $requete->execute(array($email));
    if (!$resultat = $requete->fetch()){
  
    $requete=$bdd->prepare('INSERT INTO utilisateur (nom,prenom, mdp, email) VALUES (:nom, :prenom, :mdp, :email)');

    $array = array(
      'nom' => $nom,
      'prenom' => $prenom,
      'mdp' => $mdp,
      'email' => $email
    );
    $requete->execute($array);

    echo '<script language="Javascript">
    <!--
    document.location.replace("inscrit.php");
    // -->
    </script>';
    
     
    }
    else {
      echo '<script language="Javascript">
      <!--
      document.location.replace("../index.html");
      // -->
      </script>';
      }
  ?>
  
  <p> 
    
    Prénom : <?php echo $nom; ?> <br>
    Nom : <?php echo $prenom; ?> <br>
    Mot de passe : <?php echo $mdp; ?> <br>
    Email : <?php echo $email ?> <br/>
  </p>

  <?php
  
  
  ?>

</body>
</html>
