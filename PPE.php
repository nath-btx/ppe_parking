<?php
$bdd = new PDO('mysql:host=localhost;dbname=ppe-parking;charset=utf8', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta name="Description" content="Put your description here.">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/PPE.css">
  <title>Parking</title>
  <script>
  function myFunction() {
    alert("bonsoir");
  }
  </script>
</head>
<body>

  <header>
    <h1> PPE </h1>
  </header>

  <main>
    <section>
      <form action="/connexion.php">
        First name: <input type="text" name="fname"></br>
        Last name: <input type="text" name="lname"></br>
        Password : <input type="text" name="mdp"> </br>
        <input type="submit" value="Submit">
      </form>
      <button onclick="myFunction()">Click me</button>
    </section>
  </main>
  <footer>
    <p>
      &copy; NB &amp; BG - <strong> 2019</strong>
    </p>
  </footer>
</body>
</html>
