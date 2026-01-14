<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lezione php su variabili</title>
</head>
<body>
    <?php
        $x = 7;  //variabile intera(in php non è necessario specificre il TIPO di varibile (int)
                 //da ora la variabile x conterrà il valore 1. Il risultato dell'assegnamento è il valore assegnato
        echo "Quanto vale x? <br>";
        echo "x vale: " .$x.'<br>'; //si può anche scrivere echo "x vale $x" la variabile dentro le virgolette viene interpretata e mostra il valore
        echo 'nella stringa con apici x vale: '.$x; //con apici singoli la variabile non viene interpretata

        //caratteri speciali
        echo "<hr>";
        echo"x vale \"$x\""; //il \ è un carattere speciale che rende le virgolette come stringa (quindi verrà x vale "7")

        //scrivere: il simbolo \ è un carattere speciale
        echo" <br> il simbolo \\ è un carattere speciale";
        echo" <br> il simbolo \"\\\"  è un carattere speciale";
        //metodo della prof: echo'il simbolo "\" è un carattere speciale';

        $v='"';
        echo" <br> il simbolo $v\\$v è un carattere speciale";

        echo"<br> L'insegnante dice: \"Basta variabili col $, è ora del caffè!\"";

        echo"<hr>";
        $x = 3; //in php si sovrascrive il valore della variabile
        $y = 10;
        $x = $y;
        $x = $y+2;
        echo $x;
        echo "<br>";
        //operatori matematici
        $x = "Risultato: " . ( (10 + 1) * 3); //nel caso di numerosi operatori(quali + * . =) si identificano le priorità tramite le parentesi
        echo "<br>";

        //operatore %: resto della divisione intera
        //es: 5%2 = 1, 4%2 = 0 
        //es: verificare se un numero ($x) è pari
        //$pari = ($x % 2);

        // = è assegnazione   == è verifica di uguaglianza del valore  === è verifica di uguaglianza di valore e ANCHE di TIPO di variabile
        $x= 10;
        $y = 10;
        $boolean = ($x==$y); //restituisce true o false
        //RICORDARE che se il valore bool è falso NON verrà mostrato perchè il valore vuoto equivale a false
        echo "valore booleano di \$boolean: $boolean";
        
        
        //incrementi
        echo "<hr>";
        $s = "pippo";
        //...               
        $s = $s . "pluto";
        //...
        $s = $s . "paperino";
        
        //metodo più veloce è
        $s = "pippo ";
        $s .= "pluto ";
        $s .= "paperino ";
        echo $s;
        echo "<br>";
        $x=5;
        $x += 5;
        $x++;   //++ incremento -- decremento
        echo $x;
        echo "<br>"; 
        //$x++
        $x =1;                  //prima restituisce il valore di $x poi lo incrementa
        echo "x = " .($x++);

        //++$x
        $x =1;
        echo "x = " .(++$x);    //prima incrementa poi restituisce il valore $x

        echo "<hr>";

        //esercizio: scambiare il valore  contenuto di $x e $y
        $x = 5; $y = 66;
        $temp = $x; //x in variabile temporanea
        $x = $y; //y in x
        $y = $temp; //temp in y
        echo "x: ".$x;
        echo "<br>";
        echo "y: ".$y;
        echo "<hr>";

        //operatore ternario

        $stringa = ($x > $y)?"vero":"falso";   //x e y fanno riferimento all'esercizio sopra
        echo $stringa;
        echo "<hr>";

        //esercizio: assegnare a $m il valore maggiore tra $x e $y
        $x = 77; $y=8;
        $m = ($x > $y)? $x : $y;
        echo "il valore maggiore tra x e y è : $m";
        echo "<br>";

        //esercizio: differenza di età di 2 fratelli

        $f1= 3;
        $f2 = 3;
        $diff =($f1 - $f2);
        $diff = ($diff >=0)? $diff : ($diff * -1);
        echo "la differenza di età tra i fratelli è: $diff";

        //se hanno la stessa età?
        $diff = ($f1 > $f2)? ($f1-$f2) : (($f2>$f1)?($f2-$f1) : "hanno la stessa età");
        echo $diff;
    ?>
</body>
</html>