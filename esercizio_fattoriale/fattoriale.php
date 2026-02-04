<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fattoriale</title>
</head>
<body>
    <?php 
            $n=6;
            echo"Fattoriale di $n è ".number_format(fattoriale_ricorsivo($n),0,",",".");
    
    
    function fattoriale_con_ciclo($numero)
        {
            $fattoriale = 1;
            for($i=1;$i<=$numero;$i++)
                {
                    $fattoriale = $fattoriale * $i;
                }
            return $fattoriale;
        }


    function fattoriale_ricorsivo($numero)
        {
            if($numero == 1) return 1;
            return fattoriale_ricorsivo($numero-1) *$numero;
        }
    ?>
</body>
</html>