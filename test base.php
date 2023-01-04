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
$nomBase= "hassan";
$loginPrivbilege="SiteWeb";
$passPrivilege="SiteWeb";

$GLOBALS["pdo"] = new PDO('mysql:host=' .$ipserver . ';dbname=' . $nomBase . '', $loginPrivbilege, $passPrivilege);

$requete = "select * from Patient";

$resultat = $GLOBALS["pdo"]->query($requete);

if ($resultat ->rowcount() >0){
    echo "coucou";
    while($tab = $resultat->fetch()){
        echo "coucou";
        echo "le nom est:" .$tab["nom"]." le prenom est: ".$tab["prenom"]."id :".$tab["id"]."<br>";
    }
}

}catch (Exception $error) {

 echo "error est : ". $error->getMessage();
}





?>

</body>
</html>