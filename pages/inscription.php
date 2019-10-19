<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');
?>



  <?php
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    
    $requete=$bdd->prepare('SELECT * FROM utilisateur where email = ?');
    $requete->execute(array($email));
    if (!$resultat = $requete->fetch()){
  
    $requete2=$bdd->prepare('INSERT INTO utilisateur (nom,prenom, mdp, email) VALUES (:nom, :prenom, :mdp, :email)');

    $array = array(
      'nom' => $nom,
      'prenom' => $prenom,
      'mdp' => $mdp,
      'email' => $email);
    $requete2->execute($array);

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
  
