<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hassan exo 1</title>
</head>
<body>
<?php 
   
   $Variable1 = "Une variable";
   ?>
           <div>
           <?php            

           $Variable1 = rand(0,100);
           ?>

           <div>
               <?php
               echo $Variable1;

               if($Variable1%2==1){
                   echo '<div class="var1">
                   <h1>je suis impaire</h1>
               </div>';

               }else{
                   echo '<div class="var2">
                   <h1>je suis paire</h1>
               </div>';
               }
               ?>

</body>
</html>