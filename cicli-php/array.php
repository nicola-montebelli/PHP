<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <?php 
         $a = ["Nic","Fede",2000];  //array vuoto --> false
         echo $a[0] ."<br>";
         echo $a[1] ."<br>";
         echo $a[2] ."<br>";
         //echo $a[3] ."<br>"; Warning: Undefined array key 3
         echo "<hr>";

         //aggiungere elementi all'array

         //1) aggiungere in FONDO all'array
         $a[] ="Jak";//indice 3
         $a[]=1;//indice 4

         //2)aggiungere in indice specificato
         $a[0] ="Claudia"; //Nic viene sostituito da claudia
         //se referenzio un indice non definito?
         //$a[9] ="Pippo"; //non è un problema assegnare un valore a un indice non definito
                         //ma gli indici vuoti tra indice 2 e indice 9 non li troverà e darà errore Undefined

         //$n_array = count($a); //conta gli elementi dell'array
         for($i=0;$i<count($a);$i++)     //count($a) come array.length
         {
            echo ($i+1).".". $a[$i] ."<br>";
         }
         echo "<hr>";
    ?>

    <?php 
        echo"Creare un array con i primi 10 numeri interi partendo da 0<br>";
        $numeri=[];
        for($i=0;$i<10;$i++)
        {
            $numeri[$i]=$i;
        }
        echo"Stampa dell'array con print_r <br>";
        print_r($numeri); //print ricorsiva mi scrive TUTTI gli elementi dell'array
        //volendo stamparli con un for
        echo "<hr>";

        echo "Stampa dell'array con un for <br>";
        for($i=0;$i<count($numeri);$i++)
        {
            echo "[$i] => " . $numeri[$i] . "<br>";
        }
        echo"<hr>";
    ?>

    <?php 
        //PER CASA
        //creare un array di 10 numeri pari a partire da $inizio
        $inizio =rand(1,100);
        $valoriPari=[];
        echo "10 valori pari partendo da un numero random<br>";
        while(count($valoriPari)<10)
            {
                if($inizio%2==0)
                    {
                        $valoriPari[]=$inizio;
                    }
                $inizio++;
            }
            print_r($valoriPari);
            echo "<hr>";

        //creare un array di 10 numeri random
        $r=[];
        echo "10 valori random <br>";
        for($i=0;$i<10;$i++)
            {
                $r[]=rand(1,50);        //valori random inseriti nell'array
            }
            print_r($r);
            echo "<br>";

        //sommare tutti i numeri memorizzari nell'array $r
        $somma=0;
        echo "Somma dei 10 valori random dell'array \$r<br>";
        for($i=0;$i<count($r);$i++)
            {
                $somma=$r[$i] + $somma;
            }
            echo "somma totale: " .$somma;
            echo "<hr>";

            //min e max dell'array $r
            echo "trovare il valore max e min dell'array<br>";
            $min=50;
            $max=1;
            foreach($r as $controllo)
                {
                    if($controllo<$min)
                        {
                           $min = $controllo;
                        } 
                        if($controllo>$max)
                        {
                           $max=$controllo;
                        }
                }
                echo "Valore minimo: " . $min ."<br>";
                echo "Valore massimo: " .$max . "<br>";

            echo "<hr>";
    ?>
    <?php 
    //stampare solo i valori pari di un array
        $array=[];
        $solopari=[];
        echo "Esercizio: stampare solo i valori pari di un array<br>";
        for($i=0;$i<10;$i++)
        {
            $array[$i]=$i;
            if($array[$i]%2==0){
               $solopari[$i]=$i;
            }
        }
        print_r($solopari); 
        echo "<hr>"; 
    ?>

    <?php 
        //stampare in grassetto i numeri pari e in corsivo i dispari
        echo"Stampare in grassetto i numeri pari e in corsivo i dispari<br>";
        $arraynumeri=[];
        $lunghezzaArray= rand(5,20);
        for($i=0;$i<$lunghezzaArray;$i++)
            {
                $arraynumeri[]=rand(1,30);       //creiamo i valori da mettere dentro un array di lunghezza random (5,20)

                if($arraynumeri[$i]%2==0)
                    {
                        echo "<strong>";
                        echo "Indice " . $i . " (" . $arraynumeri[$i] . ") " . "- ";
                        echo "</strong>";
                    }else
                    {
                        echo "<i>";
                        echo "Indice " . $i . " [" . $arraynumeri[$i] . "] " ."- ";
                        echo "</i>";
                    }
            }
    ?>
</body>
</html>