
<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=mabase","user","1234");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>























<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        
            echo "cocou coucou";
         function mafonction($colone1,$colone2,$colone3){
            ?>
            <table style="border: 1px solid #333;background-color:powderblue;">
            <thead >
                <tr >
                    <th colspan="2"> <?php echo"The table header made by hassan paziaud"; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr >
                    <td style="border: 1px solid #333;"><?=$colone1?></td>
                    <td style="border: 1px solid #333;"><?=$colone2?></td>
                    <td style="border: 1px solid #333;"><?=$colone3?></td>
                </tr>
                <tr >
                    <td style="border: 1px solid #333;">The table body</td>
                    <td style="border: 1px solid #333;">with two columns</td>
                    <td style="border: 1px solid #333;">with two columns</td>
                </tr>
                <tr >
                    <td style="border: 1px solid #333;">The table body</td>
                    <td style="border: 1px solid #333;">with two columns</td>
                    <td style="border: 1px solid #333;">with two columns</td>
                </tr>
            </tbody>
        </table>
        <?php }?>
      

        <?php 
        mafonction("nom","prenoms","age");
        mafonction("fruit","legumes","17");
        ?>
        
  




      /*  <?php
    $table = array(2, 4, 6, 8);
    print_r ($table);
    echo "somme de la table = " . array_sum($table) . "\n";
    $moyenne = array_sum($table)/count($table);
    echo "moyenne de la table = ". $moyenne . "\n";

       ?>*/

<?php 
        $table = array(2, 4, 6, 8);
        $somme_notes = 0;
        $i = 0;
        foreach($table as $cle=>$valeur)
        {
            $i++; // On incrémente la variable qui nous dit combien de tour on fait
            $somme_notes+=$valeur;
            // équivaut a $somme_notes = $somme_notes + $valeur
        }
        $moyenne = $somme_notes / $i;
        print_r ($table);
        echo "moyenne de la table = ". $moyenne . "\n";
        echo "il y a ". $cle ."nombre";
        ?>





    </body>
</html>
