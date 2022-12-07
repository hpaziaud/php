<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>

<form action="login.php" method="post">
        <label>Username :</label>
        <input type="text" place holder="Username" name="login" value="" required>
        <label>Mot de passe :</label>
        <input type="password" place holder="Password" name="password" value="" required>

        <input type="submit" value="Connexion">
        <input type="reset" value="Effacer">
    </form>
    

    <?php

        function renvoi($login, $password)
        {
        
        
            if ($login == "Julien" and $password == "1234")
            {
                header("location: reussite.php");
                //Si réussite renvoyer vers -> reussite.php
            }

            elseif ($login != "Julien")
            {
                //Si echec renvoyer :
                echo "<p style='color:purple;'>L'Username entré est incorrect.</p>";
            }
            elseif ($password != "1234")
            {
                //Si echec renvoyer :
                echo "<p style='color:purple;'>Le password est incorrect.</p>";
            }
        
        }
    ?>





    // -> Disconnect.php

        <?php
    session_start();

    session_destroy();
    header('Location: final.php');
    ?>




    // -> Login.php

        <?php
    session_start();
    include("final.php");
    $_SESSION["Login"] = $_POST['login'];
    $_SESSION["Password"] = $_POST['password'];
    echo renvoi($_SESSION["Login"], $_SESSION["Password"]);
    ?>


</body>

</html>