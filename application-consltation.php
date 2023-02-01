


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

if(isset($_POST["valider"])){
    echo "idmedecins = ".$_POST["idMedecins"] ." id patient = ".$_POST["idPatient"]." date = ".$_POST["laDate"]. "/n"; 
    echo "/n coucou sa marche";
    $requete = "INSERT INTO `Consultation` (`Dateheure`, `idMedecin`, `idPatient`) 
    VALUES 
    ( '".$_POST["laDate"]."', '".$_POST["idMedecin"]."', '".$_POST["idPatient"]."');";
    $resultat = $GLOBALS["pdo"]->query($requete);
}else
{
    echo "coucou elle ne marche pas";
}



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
     <a=href"http://tpfinal.alwaysdata.net/products.html"> jai les grosse fesse</a>
    <form action="" method="post">
    <select name="idPatient">
        <?php
       
        foreach ($tabPatient as $Patient) {
            ?>
        
            <option value="<?=$Patient["id"]?>"> <?=$Patient["prenom"]." ".$Patient["nom"]?> </option>
            
        <?php
        }
        ?>
          </select>
        

        <select name="idMedecins">
        <?php
        foreach ($tabMedecins as $Medecin) {
            ?>
        
            <option value="<?=$Medecin["id"]?>"> <?=$Medecin["prenom"]." ".$Medecin["nom"]?> </option>
            
        <?php
        }
        ?>
        </select>
        <input type="datetime-local" name="laDate">
        <p><input type="submit" value="submi button" name="valider" ></p>
    </form>
    
    
    
    
    
    
    
    
    
    
<?php
} catch (Exception  $error) {
    echo "error est : ".$error->getMessage();
}

?>
<button> <a href="http://tpfinal.alwaysdata.net/index.html"> j'aimes les gros seins de mariatou </a> </button>





</body>
</html>