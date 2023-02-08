<?php 
session_start();
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
      html, body {
      display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      }
      form {
      border: 5px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      button {
      background-color: #8ebf42;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grabbing;
      width: 100%;
      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: left;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      }
      span.psw {
      float: right;
      padding-top: 0;
      padding-right: 15px;
      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;
      }
    </style>
<body>

  <?php
  try {

    $ipserver = "192.168.65.60";
    $nomBase = "game";
    $loginPrivilege = "root";
    $passPrivilege = "root";

    $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

    $requete = "select * from user";
    $resultat = $GLOBALS["pdo"]->query($requete);
    $tabuser = $resultat->fetchALL();

    $requete1 = "SELECT match.id as idMatch, match.date,match.gagneNGP,user.id as idUser, user.nom,user.prenom FROM `match`,`user` where match.idUser = user.id";
    $resultat1 = $GLOBALS["pdo"]->query($requete1);
    $tabmatch = $resultat1->fetchALL();
    foreach ($tabmatch as $match) {
      echo "id :" . $match["idUser"] . "   on a nom : " . $match["nom"] . " prenom :  " . $match["prenom"] . " a gagné ? " . $match["gagneNGP"] . " le " . $match["date"] . "<br>";
    }





    if (isset($_POST["valider"])) {




      $requete = "INSERT INTO `user` (`nom`, `prenom`) VALUES ('" . $_POST['surname'] . "', '" . $_POST["name"] . "')";
      $resultat = $GLOBALS["pdo"]->query($requete);
      $_SESSION["idUser"] = $GLOBALS["pdo"]->lastInsertId();
      echo "l'id du user est".$_SESSION["idUser"]. "\n";
      $name = $_POST['name'];



      echo "name = " . $_POST['name'] . " nom = " . $_POST['surname'] . ".";
    } else {
      echo "ca ne marche pas";
    }

  ?>


    <?php

    if (!isset($_SESSION['count'])) {
      $_SESSION['count'] = 0;
    } else {
      $_SESSION['count']++;
    }
    ?>
    

    <h1>HTML Form name Attribute.</h1>
   
    <form action="" method="POST">
    <div class="formcontainer">
    <hr/>
    <div class="container">
      First name:

      <input type="text" name="surname">
      <br> Last name:

      <input type="text" name="name">
      <br>

      <input type="radio" name="choice" value="pierre" />Pierre
      <input type="radio" name="choice" value="papier" />Papier
      <input type="radio" name="choice" value="ciseaux" />Ciseaux
      <input type="submit" name="valider" value=''>

    </form>
    </div>

    <?php
    if (isset($_POST['valider'])) {
      $user_choice = $_POST['choice'];
      $choices = array("pierre", "papier", "ciseaux");
      $computer_choice = $choices[array_rand($choices)];

      echo "Vous avez choisi : " . $user_choice . "<br>";
      echo "L'ordinateur a choisi : " . $computer_choice . "<br><br>";

      if ($user_choice == $computer_choice) {
        echo "Egalité !";
        $requete5 = "INSERT INTO `match` (`gagneNGP`, `date`, `idUser`) VALUES ('N', current_timestamp(), '" .$_SESSION["idUser"]. "');";
        $resultat5 = $GLOBALS["pdo"]->query($requete5);
        $tabuser5 = $resultat5->fetchALL();
      } elseif (
        $user_choice == "pierre" && $computer_choice == "ciseaux" ||
        $user_choice == "papier" && $computer_choice == "pierre" ||
        $user_choice == "ciseaux" && $computer_choice == "papier")
      {  
        $requete4 = "INSERT INTO `match` (`gagneNGP`, `date`, `idUser`) VALUES ('G', current_timestamp(), '" .$_SESSION["idUser"]. "');";
    $resultat4 = $GLOBALS["pdo"]->query($requete4);
    $tabuser4 = $resultat4->fetchALL();

       

        echo "Vous avez gagné !";
      } else {
        $requete6 = "INSERT INTO `match` (`gagneNGP`, `date`, `idUser`) VALUES ('E', current_timestamp(), '" .$_SESSION["idUser"]. "');";
        $resultat6 = $GLOBALS["pdo"]->query($requete6);
        $tabuser6 = $resultat6->fetchALL();
        echo "L'ordinateur a gagné !";
      }
    }
    ?>
<p>
      Bonjour visiteur, vous avez vu cette page <?php echo $_SESSION['count']; ?> fois.
    </p>

  <?php
  } catch (Exception  $error) {
    echo "error est : " . $error->getMessage();
  }
  ?>


</div>
  </form>
</body>

</html>