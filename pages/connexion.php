<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe_parking;charset=utf8', 'root', '');


  $email=$_POST['email'];
  $mdp=$_POST['mdp'];
  $array = array(
    'email' => $email,
    'mdp' => $mdp,
    );
  $requete=$bdd->prepare('SELECT idnum, email, mdp, admin FROM utilisateur WHERE email = "'.$email.'" AND mdp = "'.$mdp.'"');
  $requete->execute();
  $resultat = $requete->fetch();
  $idnum = $resultat['idnum'];
  if ($resultat){
    if ($resultat['admin'] == 0){

    }
    session_start();
    $_SESSION["login"]=$idnum;
    $_SESSION["idplace"] = 0;

    
    echo '<script language="Javascript">
	  <!--
	  document.location.replace("connecte.php");
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

