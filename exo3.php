<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>


<table border="1px" class="var1">
        <caption>Tableau à double entrée en PHP</caption>

    <?php

    $a; $b;
    $utilisateurs = array(
        0 => array('Nom' => 'Tabary', 'Prénom' => 'Hugo', 'motDePass' => 'Sm2t4t59gYMF'),
        1 => array('Nom' => 'Dimont', 'Prénom' => 'Louis', 'motDePass' => '4aJe5CFAp6d3'),
        2 => array('Nom' => 'Dupuis', 'Prénom' => 'Justin', 'motDePass' => 's2E95V6iRFja'),
        3 => array('Nom' => 'Baudet', 'Prénom' => 'Grégoire', 'motDePass' => '4jq9MjgYE5J5'),
        4 => array('Nom' => 'Boffrand', 'Prénom' => 'Armand', 'motDePass' => '9MzU38Zbs2zU')
        // Prénom, Nom et mot de passe aléatoire https://www.motdepasse.xyz/ - https://fr.fantasynamegenerators.com/noms-fran%C3%A7ais.php

    );

    for ($a = 0; $a < 5; $a++)
    {

    echo "<tr><td>" .$utilisateurs[$a]['Nom']. " - " .$utilisateurs[$a]['Prénom'].  " - " .$utilisateurs[$a]['motDePass']. "</td></tr>";
    }

    ?>

</body>

</html>