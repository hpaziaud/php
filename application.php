<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    $requete1 = "SELECT match.id as idMatch, match.date,match.gagneNGP,user.id as idUser, user.nom,user.prenom FROM `match`,`user` where match.idUser = user.id";
    $resultat1 = $GLOBALS["pdo"]->query($requete1);
    $tabmatch = $resultat1->fetchALL();
    foreach ($tabmatch as $match) {
      echo "id :" . $match["idUser"] . "   on a nom : " . $match["nom"] . " prenom :  " . $match["prenom"] . " a gagné ? " . $match["gagneNGP"] . " le " . $match["date"] . "<br>";
    }





    if (isset($_POST["valider"])) {

     
      $requete3 = "SELECT `id` FROM `user` WHERE user.nom =. ".$_POST['surname'].";";
      $resultat3 = $GLOBALS["pdo"]->query($requete3);
      $tabidUser = $resultat3->fetchALL();
      $idener = $tabidUser

      echo "name = " . $_POST["name"] . " nom = " . $_POST["surname"] . "id = " . $idener . "\n";

      $requete = "INSERT INTO `user` (`nom`, `prenom`) VALUES ('" . $_POST['surname'] . "', '" . $_POST["name"] . "')";
      $resultat = $GLOBALS["pdo"]->query($requete);
      $name = $_POST['name'];
    } else {
      echo "ca ne marche pas";
    }

  ?>


    <?php
    session_start();
    if (!isset($_SESSION['count'])) {
      $_SESSION['count'] = 0;
    } else {
      $_SESSION['count']++;
    }
    ?>
    <p>
      Bonjour visiteur, vous avez vu cette page <?php echo $_SESSION['count']; ?> fois.
    </p>

    <h2>HTML Form name Attribute.</h2>
    <form action="" method="POST">
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


    <?php
    if (isset($_POST['valider'])) {
      $user_choice = $_POST['choice'];
      $choices = array("pierre", "papier", "ciseaux");
      $computer_choice = $choices[array_rand($choices)];

      echo "Vous avez choisi : " . $user_choice . "<br>";
      echo "L'ordinateur a choisi : " . $computer_choice . "<br><br>";

      if ($user_choice == $computer_choice) {
        echo "Egalité !";
      } elseif (
        $user_choice == "pierre" && $computer_choice == "ciseaux" ||
        $user_choice == "papier" && $computer_choice == "pierre" ||
        $user_choice == "ciseaux" && $computer_choice == "papier"
        
      ) {

        echo "Vous avez gagné !";
      } else {
        echo "L'ordinateur a gagné !";
      }
    }
    ?>


  <?php
  } catch (Exception  $error) {
    echo "error est : " . $error->getMessage();
  }
  ?>



  </form>
</body>

</html>