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

<form method="post">
   <label>name : </label> 
 <input type="text" placeholder="Enter Password" name="name" id="name1" value="<?php echo $name; ?>" required> 
 </div>
 <div>
<label>Password : </label> 
 <input type="password" placeholder="Enter Password" name="password" id="password1" value="<?php echo $password; ?>" required> 
 <button type="submit">Login</button>
</form>

<?php
if (isset($_POST["name"]) && ($_POST["password"])) {
    
    $name = $_POST["name"];
    $password= $_POST["password"]
    if (($name =="julien") && ($password=="1234")) {
        echo "vous etes connecter";

    }else{
        echo"again";
    }
  }else{
    echo"mercie de remplir le champs";
  }

?>




 </div>
 </div>
</body>
</html>