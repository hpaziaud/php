<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>

<form action="ex7.php" method="post">
                <label>Veuillez saisir un numéro de téléphone :</label>
                <input type="text" placeholder="ex : 06 32 48 56 98" name="numero">
                <input type="submit" value="Confirmer">  
                <input type="reset" value="Supprimer">          
            </form> <br>

            <?php

            //Stockage de la variable
                $_SESSION["User"] = $_POST["numero"];

                if ($_SESSION["User"] == '')
                {
                    echo "<font color='purple'> Impossible de trouver le numéro saisi, veuillez à nouveau saisir un numéro</font>";
                }
                else{
                    echo "Le numéro de téléphone enregistré est le : <font color='red'>".$_SESSION["User"]."</font>";
                }

            ?>


</body>

</html>