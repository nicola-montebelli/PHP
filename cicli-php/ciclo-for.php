<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istruzioni Cicliche</title>
</head>
<body>
    <?php
        //Istruzioni Cicliche - CICLO FOR
        echo "Ciclo FOR semplice:<br>";

        for($i=1;$i<=10;$i++)
        {
            echo "$i ";
        } 
        echo "<hr>";

        echo "Ciclo FOR per identificare i numeri pari e dispari:<br>";
        for($i=1;$i<=10;$i++){      //vogliamo verificare quali numeri tra 1 e 10 sono pari o dispari

        //con operatore ternario: echo "$i è " . (($i%2)? "dispari" : "pari") . "<br>"; RICORDARSI che il risultato 0 nella condizione verrà valutata come falso
            if($i%2==0){
                echo " $i è un numero pari <br>";
            }else{
                echo "$i è un numero dispari <br>";
            }
        }
        echo "<hr>";
        echo "Ciclo FOR decrescente:<br>";
        //elenco dei numeri da 10 a 1
        for($i=10;$i>=1;$i--){
            echo "$i è " . (($i%2)? "dispari" : "pari") . "<br>";
        }

        echo "<hr>";
        echo"Ciclo FOR decrescente con variabile di iterazione che conta i giri:<br>";
        $numero = 10;
        for($i=1;$i<=10;$i++){   //stesso esercizio sopra ma con $i nel for che conta i cicli
            echo $numero . " ";
            $numero--;
        }
        echo "<hr>";

        //1- contare quante volte ho eseguito il ciclo
        //2- contare quante volte il numero è pari
        //3- il numero è compreso senza uguale tra $min e $max
        //4- sommare i numeri pari
        echo" Esercizio di classe:<br>";
        $cicli = 0;
        $npari=0;
        $min = 3;
        $max = 6;
        $compreso = 0;
        $sommapari = 0;
        for($i=1; $i<=10; $i++){
            $cicli++;              //contare i numeri di cicli
            echo "$i ";
                if($i%2==0){    //contare i numeri pari
                    $npari++;
                    $sommapari = $sommapari + $i;
                }
                if($min < $i && $i < $max){     //contare i numeri compresi tra min e max
                    //echo " è compreso ";
                    $compreso++;
                }
        }     
        echo "<br> 1) numero di cicli: $cicli <br>";    
        echo "2) i numeri pari sono: $npari <br>";
        echo "3) i numeri compresi tra $min e $max sono $compreso <br>";
        echo "4) la somma dei numeri pari è: $sommapari <br>";

        echo "<hr>";

        //sommare i numeri pari tra $inizio e $fine
        $inizio = 2;
        $fine = 2;
        $somma=0;
        for($i=$inizio;$i<=$fine;$i++){
            if(!($i%2)){        //equivale a $i%2==0
                $somma = $somma + $i;  
                echo "ciclo: $i) somma: ($somma) <br>";
            }
            //echo "ciclo: $i) somma: ($somma) <br>";
        }
        echo "La somma dei numeri pari compresi tra $inizio e $fine è: $somma <br>";
        echo "<hr>";

        //CICLO INFINITO
        //c'è quando la condizione da verificare è sempre vera

        // for($i=1;$i>=1; $i++){
        //     echo "~$i~";
        // }    

        //BREAK e CONTINUE

        //break forza l'uscita dall'istruzione ciclica
        echo "Esempio di break (i == 7)<br>";
        for($i=1;$i<=10;$i++){
            echo "$i ";
            if($i==7){
                break;
            }
        }
        echo "<hr>";
        echo "esempio di continue se i numeri son dispari<br>";
        //continue forza l'uscita dall'iterzione corrente
        for($i=1;$i<=10;$i++){
            if($i%2==0){
                echo $i . " ";
            }else{
                continue;   //nell'esempio se $i è dispari il 'continue' salta l'iterazione e passa alla successiva che se è pari la stamperà
            }
        }
        echo "<hr>";
        echo "esempio di continue con condizione con OR<br>";
        //considerare tutti i numeri tranne 5 e 8
        for($i=1;$i<=10;$i++){
            if($i==5 || $i==8){
                continue;
            }else{
                echo $i . " ";
            }
        }
        echo "<hr>";
        //Esercizi da slide 7 - 8 - 9  
    ?>

    <table border="1">
    <?php   //9- stampare una tabellina pitagorica 10*10 PER CASA  aggiungere gli header con i numeri da moltiplicare

    $righe =10;
    $colonne = 10;
    $tabellina= 0;

    for($r=1; $r<=$righe;$r++){
        echo "<tr>" ;
        for($c=1; $c<=$colonne;$c++){       //tabella dinamica
            $tabellina = $r * $c;
            echo "<td> $tabellina </td>";
        }      
         echo "</tr>";
    }
    ?>
    </table>
</body>
</html>