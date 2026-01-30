<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funzioni definite dall'utente</title>
</head>
<body>
    <?php 
        //creare un numero pari random tra 1 e 100
        $n1 = rand_pari(1,100);
        echo "Numero pari random 1: $n1<br>";

        $n2 = rand_pari(-10,10);
        echo "Numero pari random 2: $n2<br>";

        //voglio la somma di due numeri random pari
        $somma = somma($n1,$n2);
        echo "Calcolo: $somma<br>";
        echo"<hr>";

        echo scrivi_somma($n1,$n2);     //alternativa trovata in classe
        echo "<hr>";





        $pari_dispari=rand(0,1);        //random per il vero o falso

        $numero = rand_pari_dispari(1,100,$pari_dispari);  //se $pari_dispari è vero richiama la funzione rand_pari per stampare un valore pari da 1 a 100
                                                           //se $pari_dispari è falso richiama la funzione rand_dispari per stampare un valore dispari da 1 a 100
        if($pari_dispari)
            {
                echo "$numero (pari)<br>";
            }else echo "$numero (dispari)<br>";






























        //funzione definita dall'utente
        function rand_pari($min,$max){
            $n=rand($min,$max);         
            if($n %2==1){
                $n++;
            }
            return $n; //col il return si ritorna al richiamante (rand_pari in alto)
        }
        //definizione della funzione somma
        function somma($a1,$a2)
        {
            $addizione= $a1+$a2;
            return $addizione;
        }

        function scrivi_somma($x,$y)        //alternativa trovata in classe
        {
            echo "$x + $y = " . somma($x,$y);
            return;                                 //return = 1)finita l'istruzione ritorno al chiamante; 2) ritorna un valore definito al chiamante
                                                    //se c'è solo return; può anche non essere messa
            //return "$x + $y = " . somma($x,$y);
        }
        
        function rand_dispari($min,$max){
            $n=rand($min,$max);         
            if($n %2==0){
                $n++;
            }
            return $n;
        }

        //definire la funzione rand_pari_dispari uguale alla precedente che può generare numero rand. pari o dispari
        function rand_pari_dispari($min,$max,$is_pari_dispari)
        {
            if($is_pari_dispari == true)        //se il terzo parametro è vero ritorna eseguendo la funzione rand_pari
                {
                    return rand_pari($min,$max);
                }
            else
                {
                    return rand_dispari($min,$max);
                }
        }    
    ?>
</body>
</html>