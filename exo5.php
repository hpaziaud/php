<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>


<form action="#" method="post">
            <label>Veuillez saisir un numéro de téléphone :</label>
            <input type="text" placeholder="ex : 06 32 48 56 98" name="numero">
            <input type="submit" value="Confirmer">            
        </form> <br>

        <?php
        echo "Le numéro de téléphone enregistré est le : <font color='red'>".$_POST["numero"]."</font>";
        ?>

</body>

</html>