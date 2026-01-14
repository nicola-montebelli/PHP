<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istruzioni Condizionali - IF ELSE - SWITCH</title>
</head>
<body>
    <?php 
    echo"-Istruzione Condizionale IF ELSE: <br>";   //IF ELSE
        if(true){
            echo "La condizione è vera <br>";
            echo" Siamo ancora dentro l'IF <br>";
        }
        echo"Fine IF <br>";
        echo"<hr>";

        $x = 0;
        if($x==0){
            echo"Vero";
        }else{
            echo"Falso";
        }

        //$y compreso
        //-1<$y<=1
        //suddividere in due parti
        //1 parte -1 <= $y
        //2 parte $y <= 1
        echo"<hr>";
        $y = 0;
        if(($y>= -1)&&($y <= 1)){   //AND (&&) logico restituisce il valore true se ENTRAMBE le condizioni sono vere
            echo"Vero";             //OR (||) logico restituisce il valore true se ALMENO UNA delle CONDIZIONI è vera
        }else{                      //nell' OR se la prima condizione è vera la seconda non verrà considerata
            echo"Falso";
        }
        echo"<hr>";

        //esercizio differenza età fratelli
        $f1=12;
        $f2=10;
        // $diff = $f1-$f2;
        // if($diff<0){
        //     echo "la differenza di età è: " .($diff*-1);
        // }else{
        //     echo " la differenza di età dei fratelli è: " . $diff;           [metodo mio]
        // }
        // if(($f1==$f2) || ($diff==0)){
        //     echo" <br>I fratelli hanno la stessa età ";
        // }       

        //metodo della classe
        if($f1>$f2){
            echo($f1 - $f2);
        } else{
            if($f1==$f2){
                echo "Hanno la stessa età";
            }else{
                echo($f2-$f1);
            }
        }
        echo"<hr>";
        //scambiare il contenuto di $x e $y
        //in modo che $x sia il maggiore dei due
        $n1=6;
        $n2=23;
        if($n1==$n2){
            echo"I valori sono uguali";
        }   else
                {
                if($n1>$n2){
                     echo $n1. " è maggiore di " . $n2;
                }else{
                    $temp=$n2;
                    $n2=$n1;
                    $n1=$temp;
                    echo "i valori sono stati scambiati";
                }
            }   
        
        echo"<hr>";

        //dato un $numero scrivere a quale decina appartiene
        $numero=5;
        $decina=0;

        if($numero >= 0 && $numero <10){ //numero compreso tra 1 e 9
            $decina=1;
            echo $numero . " è un'unità";
        }
        else if($numero > 10 && $numero <99){     //numero compreso tra 10 e 99
            $decina=2; 
            echo $numero . " è una decina";      
        }
        else if($numero >99 && $numero <999){   //numero compreso tra 100 e 1000
            $decina=3;
            echo $numero . " è un centinaio";
        }
        else if($numero > 999 && $numero < 9999){   //numero compreso tra 1000 e 9999
            $decina=4;
            echo $numero . " è un migliaio";
        }



        //esercizi per casa

        //1- il corso è composto da 8 ore alla settimana, quante settimane servono per arrivare a 105 ore
        //---------------

        //2- data la stringa testo verificare se inizia con una lettera maiuscola o minuscola
        //2a- se inizia con una lettera (sia maiuscola che minuscola)
        echo "<hr>";
        $testo="Cognome";
        if(($testo>= "A" && $testo<="Zzzz") /*|| ($testo >= "a" && $testo <="zzz")*/){     //facendo riferimento al codice ASCII "A" è la lettera maiuscola più PICCOLA mentre "Zzzz" ha le minuscole più grandi come valore
            echo "$testo inizia con la maiuscola";                      //metodo per la parte due dell'esercizio
            //echo "Inizia con una lettera";
        }else{
            echo "$testo inizia con la minuscola";
            //echo"Non inizia con una lettera";
        }
        echo"<hr>";

        echo"-Seconda istruzione condizionale SWITCH: <br>";    //SWITCH

        $x1="pippo";

        switch($x1){
            case 0: echo "$x1 = 0"; break;
            case 1: echo "$x1 = 1"; break;
            case 2: echo "$x1 = 2"; break;
            case 3: echo "$x1 = 3"; break;
            case 4: echo "$x1 = 4"; break;

            default : echo "$x1 non è tra i valori dei case";
        }
        echo "<br> Fuori dallo switch";
        echo "<hr>";

        //quanti giorni mancano al fine mese di gennaio
        $mese=date("n");   //mese corrente senza 0 iniziale
        switch($mese){
            case 1: $giornimese = 31; break;
            case 2: $giornimese = 28; break;  //controllare se l'anno è bisestile
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12: $giornimese = 31; break;  //i mesi che hanno gli stessi giorni condividono l'istruzione quindi si possono scrivere così
            default: $giornimese = 30; break;
        }
        
        $giorno = date("j");    //formato dinamico di data di oggi senza 0 iniziali
        $g=$giornimese - $giorno;
        if($g==1){
            echo " manca " . $g ." giorno alla fine del mese";
        }else{
                echo "mancano " .$g ." giorni alla fine del mese";
                echo "<br>";
        }  
     ?>
</body>
</html>