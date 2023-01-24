


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php echo "<h1>coucou je suis pres et vous ?</h1>";

try {

    $ipserver ="192.168.65.60";
    $nomBase = "Medecin";
    $loginPrivilege ="root";
    $passPrivilege ="root";

    $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

    $requete = "select * from Patient";

    $resultat = $GLOBALS["pdo"]->query($requete);
    //resultat est du coup un objet de type PDOStatement
    $tabMedecins = $resultat->fetchALL();
    foreach ($tabMedecins as $Medecin) {
       echo $Medecin["nom"]." ".$Medecin["prenom"]."<br>";
    }

    

} catch (Exception  $error) {
    echo "error est : ".$error->getMessage();
}

?>






</body>
</html>