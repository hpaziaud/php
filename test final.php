<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>

<?php

<?php

session_start();


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  // L'utilisateur est connecté, afficher le message de bienvenue et le bouton de déconnexion
  echo "Bienvenue, vous êtes connecté. <br><br>";
  echo "<button type='button' onclick='logout()'>Déconnexion</button>";
} else {
  // L'utilisateur n'est pas connecté, afficher le formulaire de connexion
  if(isset($_POST['login']) && isset($_POST['password'])) {
    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Comparer les données avec les valeurs stockées dans le code
    if($login == "Julien" && $password == "1234") {
      // Login et mot de passe corrects, connecter l'utilisateur
      $_SESSION['loggedin'] = true;
      header('Location: app.php');
    } else {
      // Login ou mot de passe incorrect, afficher un message d'erreur
      if($login != "Julien") {
        echo "Le login est inconnu. <br><br>";
      } else {
        echo "Le mot de passe est incorrect. <br><br>";
      }
      // Afficher le formulaire de connexion
      echo "<form action='app.php' method='post'>";
      echo "Login : <input type='text' name='login'><br>";
      echo "Mot de passe : <input type='password'







</body>

</html>
