<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
echo "coucou";
?>


<div>
<div>
<?php
<label>name : </label> 
 <input type="text" placeholder="Enter Password" name="name" required> 
 </div>
 <div>
<label>Password : </label> 
 <input type="password" placeholder="Enter Password" name="password" required> 
 <button type="submit">Login</button>

?>


 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  // L'utilisateur est connecté, afficher le message de bienvenue et le bouton de déconnexion
  echo "Bienvenue, vous êtes connecté. <br><br>";
  echo "<button type='button' onclick='logout()'>Déconnexion</button>";


  $my_variable = "Hello World!";

if ($my_variable) {
  echo $my_variable;
}

 </div>
 </div>
</body>
</html>