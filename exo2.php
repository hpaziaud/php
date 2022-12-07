<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>



<table border="2px" id="tab">
        <caption>2.1</caption>

    <?php
            

            
            // 2.1
            $i;
            $legumes = array(25,42,47,24, 56);

            

            for ($i = 0; $i < sizeof($legumes); $i++)
            {
                echo "<tr><td>Element " .($i+1). " = " .$legumes[$i]. "</td></tr>";
            }



    
    ?>



</table>

                    <div class="ex2_2">
                    <?php

                    // 2.2
                    $identite = array(
                                    
                        
                                
                        'Nom' => 'Tabary', 
                        'Prenom' => 'Hugo', 
                        'MDP' => '1234', 


                        
                    );

                    echo "<br>";
                    echo "<h4>2.2</h4>";
                    echo "Nom : " .$identite['Nom']."<br>";
                    echo "Prenom : " .$identite['Prenom']."<br>";
                    echo "MDP : " .$identite['MDP']."<br>";


                    ?>


</body>

</html>