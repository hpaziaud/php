<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hello 


<?php echo "<div>salut</div>";

try{
$ipserver="192.168.65.193";
$nomBase= "hassan paziaud";
$loginPrivbilege="SiteWeb";
$passPrivilege="SiteWeb";

$GLOBALS["pdo"] = new PDO('mysql:host=' .$ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilage);

$requete = "select * from patient";
$resultat = $GLOBALS["pdo"]->query($requete);

if ($resultat ->rowcount() >0){
    while($tab = $resultat->fetch()){
        echo "le nom est:" .$tab["nom"]." le prenom est: ".$tab["prenom"]."id :".$tab["id"]."<br>";
    }
}

}catch (\throwable $th) {

 echo"error est : ". $error->getMessage();
}





?>

</body>
</html>