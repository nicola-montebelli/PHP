<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istruzioni Cicliche</title>
</head>
<body>
    <?php 
        $i=1;
        while($i<=10)
        {
            echo "Ciao $i <br>";
            $i++;
        }
        echo "Fuori dal <i>while</i><br>";
        echo "<hr>";

        //scrivere i numeri pari da 1 a 10
        $num=1;
        while($num<=10)
        {
            if($num%2==0)
            {
                echo $num ."<br>";
            }
            $num++;
        }
        echo "Fuori dal WHILE<br>";
        echo "<hr>";

        $n=10;
        echo"Esempio di do-while<br>";
        do{
            echo "$n <br>";
            echo "Il valore viene stampato ALMENO una volta prima di considerare la condizione<br>";
            $n++;
        }while($n<=10);
    ?>
</body>
</html>