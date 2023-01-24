


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
    $nomBase = "medecin";
    $loginPrivilege ="root";
    $passPrivilege ="root";

    $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

    $requete = "select * from Patient";
    $requete2 =  "select * from Medecin";
    $resultat = $GLOBALS["pdo"]->query($requete);
    $resultat2 = $GLOBALS["pdo"]->query($requete2);
    //resultat est du coup un objet de type PDOStatement
    $tabPatient = $resultat->fetchALL();
    $tabMedecins = $resultat2->fetchALL();
    ?>

    <form action="" method="post">
    <select name="idPatient">
        <?php
       
        foreach ($tabPatient as $Patient) {
            ?>
        
            <option value="<?=$Patient["nom"]?>"> <?=$Patient["prenom"]?> </option>
            
        <?php
        }
        ?>
          </select>
        

        <select name="idMedecins">
        <?php
        foreach ($tabMedecins as $Medecin) {
            ?>
        
            <option value="<?=$Medecin["nom"]?>"> <?=$Medecin["prenom"]?> </option>
            
        <?php
        }
        ?>
        </select>
    </form>
    
    
    
    
    
    
    
    
    
    
<?php
} catch (Exception  $error) {
    echo "error est : ".$error->getMessage();
}

?>







</body>
</html>