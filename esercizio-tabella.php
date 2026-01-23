<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esecizio tabella</title>
</head>
<body>
    <?php 
        //creare un array di 20 elementi multipli di 5 partendo da un numero random tr 1,10
        $nRand= rand(1,10);
        $a=[];
        $colore=0;
        $partenza=0;
        //parto da $nRand e inserisco elementi di 5 in 5

        // for($i=0;$i<20;$i++)
        //     {
        //         $a[]=$nRand+(5*$i);
        //     }
        //     print_r($a);
        //     echo"<br>";

        if($nRand%5==0) $partenza=$nRand;
        else $partenza = $nRand +(5 - $nRand %5);   //se % di $nRand da resto sottrarlo a 5, il risultato poi sarà sommato a $nRand

        while($nRand %5 !=0)    //20 elementi multipli di 5 a partire da un random
            {
                $nRand++;       //finchè il random non è %5=0 incrementa quel valore
            }
        for($i=0;$i<20;$i++)
            {
                $a[]=$nRand+(5*$i);
            }
            print_r($a);
            echo "<br>";

            echo"<table>";  //creazione tabell
            //echo "<tr> <td style='background-color:#ccc'> Valori</td></tr>";
        for($i=0;$i<count($a);$i++)
            {
                $colore="#000";
                if($a[$i]==date("j"))  //date j è il giorno corrente
                    {
                        echo $colore="#f00";
                    }
                if($i%10==0)
                    {
                        echo "<tr> <td style='background-color:#ccc'> Valori</td></tr>";
                    }
                echo "<tr> <td style='color: $colore'> ".$a[$i]."</td></tr>";   //stampa una tabella
            }
            echo "</table>"
    ?>
</body>
</html>