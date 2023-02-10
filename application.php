<?php 
session_start();

//nombre de fois ou iduser à gagné 
//SELECT user.nom,COUNT(match.idUser) FROM `match`,`user` WHERE match.gagneNGP='G' AND match.idUser=user.id GROUP BY idUser;

?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style-application.css" type="text/css">
  <title>Document</title>
</head>

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

    $requete1 = "SELECT DISTINCT match.id as idMatch, match.date,match.gagneNGP,user.id as idUser, user.nom,user.prenom FROM `match`,`user` where match.idUser = user.id";
    $resultat1 = $GLOBALS["pdo"]->query($requete1);
    $tabmatch = $resultat1->fetchALL();
   





    if (isset($_POST["valider"])) {
      
      $requete8 = "SELECT * FROM `user` WHERE `nom` = '" . $_POST['surname'] . "' AND `prenom` = '". $_POST["name"] ."'";
      
      $resultat8 = $GLOBALS["pdo"]->query($requete8);
      $tab = $resultat8->fetch();
      if ($resultat8->rowCount()>0){
        $_SESSION["idUser"]=$tab["id"];
      }else{

      
      $requete = "INSERT INTO `user` (`nom`, `prenom`) VALUES ('" . $_POST['surname'] . "', '" . $_POST["name"] . "')";
      $resultat = $GLOBALS["pdo"]->query($requete);
      $_SESSION["idUser"] = $GLOBALS["pdo"]->lastInsertId();
      $name = $_POST['name'];

      }

      
    } else {
      echo "";
    }

  ?>


    <?php

    if (!isset($_SESSION['count'])) {
      $_SESSION['count'] = 0;
    } else {
      $_SESSION['count']++;
    }
    ?>
    

    
   
    <form action="" method="POST">
    <div class="formcontainer">
    <h1>play game</h1>
    <hr/>
    <div class="container">
 
      First name:

      <input type="text" name="surname" required>
      <br> Last name:

      <input type="text" name="name" required>
      <br>

      <input type="radio" name="choice" value="pierre" required/>Pierre
      <input type="radio" name="choice" value="papier" />Papier
      <input type="radio" name="choice" value="ciseaux" />Ciseaux
      <input type="submit" name="valider" value='submuit value' class="button" required>
    </div>
    <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        
      </div>
    </form>
    

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
        $requete6 = "INSERT INTO `match` (`gagneNGP`, `date`, `idUser`) VALUES ('P', current_timestamp(), '" .$_SESSION["idUser"]. "');";
        $resultat6 = $GLOBALS["pdo"]->query($requete6);
        $tabuser6 = $resultat6->fetchALL();
        echo "L'ordinateur a gagné !";
      }
    }
    ?>
    <?php
   if (isset($_POST["valider"])){
   echo "Bonjour id :". $_SESSION["idUser"] ." ". $_POST['surname'] ." ". $_POST['name'] .", vous avez vu cette page ". $_SESSION['count'] ." fois.";
  
   }else{
echo"coucou";
   }
   ?>
   
  <?php
  } catch (Exception  $error) {
    echo "error est : " . $error->getMessage();
  }
  ?>
  <?php
 foreach ($tabmatch as $match) {
      echo "<p> id : " . $match["idUser"] . "   on a nom : " . $match["nom"] . " prenom :  " . $match["prenom"] . " a gagné ? " . $match["gagneNGP"] . " le " . $match["date"] . "</p>";
    }
?>

<?php
  $requete7 = "SELECT user.nom,COUNT(match.idUser) FROM `match`,`user` WHERE match.gagneNGP='G' AND match.idUser=user.id GROUP BY idUser;";
  $resultat7 = $GLOBALS["pdo"]->query($requete7);
  $tabjouer = $resultat7->fetch();
 echo $tabjouer;
?>

</body>

</html>