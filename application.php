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
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>





<?php
if (isset($_POST['submit'])) {
  $user_choice = $_POST['choice'];
  $choices = array("pierre", "papier", "ciseaux");
  $computer_choice = $choices[array_rand($choices)];

  echo "Vous avez choisi : " . $user_choice . "<br>";
  echo "L'ordinateur a choisi : " . $computer_choice . "<br><br>";

  if ($user_choice == $computer_choice) {
    echo "Egalité !";
  } elseif ($user_choice == "pierre" && $computer_choice == "ciseaux" ||
           $user_choice == "papier" && $computer_choice == "pierre" ||
           $user_choice == "ciseaux" && $computer_choice == "papier") {
    echo "Vous avez gagné !";
  } else {
    echo "L'ordinateur a gagné !";
  }
}
?>
<form action="" method="post">
  <input type="radio" name="choice" value="pierre" />Pierre
  <input type="radio" name="choice" value="papier" />Papier
  <input type="radio" name="choice" value="ciseaux" />Ciseaux
  <input type="submit" name="submit" value="Jouer" />






</form>
</body>
</html>