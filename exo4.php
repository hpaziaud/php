<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>

<?php

$a = 2; $b = -9; $c = -5;
// Équation réalisé avec https://calculis.net/resoudre-equation-second-degre
$delta = pow($b, 2) - (4*$a*$a);
//b²-4ac
$x0 = -$b/(2*$a);
//Si 1 solution -> -b/2a
$x1 = (-$b+sqrt($delta))/(2*$a);
$x2 = (-$b-sqrt($delta))/(2*$a);
//Si 2 solutions -> (-b+Rd)/(2a)  et  (-b-Rd)/(2a) -> SQRT = racine

echo "<br> On cherche à résoudre l'équation <strong> ax²+bx+c </strong> avec pour valeurs :<br>A=<strong> 2</strong><br>B= <strong>-9</strong><br>C= <strong>-5</strong><br><br>";
//Consigne

if ($delta > 0)
//Si Delta > 0 alors 2 solutions
{
    echo "L'équation admet deux solutions <strong>X1</strong> et <strong>X2</strong> qui sont : <br> X1= <strong>" .$x1. "</strong><br> X2 =<strong> ".$x2. "</strong>";
}
elseif ($delta == 0)
//Sinon si Delta est strictement = 0 alors 1 solutions
{
    echo "L'équation n'admet qu'un solution X0 qui est :<br>".$x0;
}
elseif ($delta < 0)
//Sinon si Delta < 0 alors 0 solution
{
    echo "L'équation donnée n'admet pas de solution :/ ";
}






?>

</body>

</html>