
<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
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