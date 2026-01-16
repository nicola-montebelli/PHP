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
        //creare un array con i primi 10 numeri interi partendo da 0
        $numeri=[];
        for($i=0;$i<10;$i++)
        {
            $numeri[$i]=$i;
        }
        echo"stampa dell'array con print_r <br>";
        print_r($numeri); //print ricorsiva mi scrive TUTTI gli elementi dell'array
        //volendo stamparli con un for
        echo "<hr>";
        echo "stampa dell'array con un for <br>";
        for($i=0;$i<count($numeri);$i++)
        {
            echo "[$i] => " . $numeri[$i] . "<br>";
        }
        echo"<hr>";
    ?>

    <?php 
        //PER CASA

        // //stampare solo i valori pari di un array
        // $array=[];
        // for($i=0;$i<10;$i++)
        // {
        //     $array[$i]=$i;
        //     if($array[$i]%2==0)              //da rivedere
        //         {
        //             print_r($array);
        //         }
        // }

        
         
        //stampare in grassetto i numeri pari e in corsivo i dispari



        //creare un array di 10 numeri pari a partire da $inizio
        $inizio =rand(1,100);
        $valoriPari=[];
        echo "10 valori pari <br>";
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
                $r[]=rand(1,10);
            }
            print_r($r);
            echo "<hr>";

        //sommare tutti i numeri memorizzari nell'array $r
        $somma=0;
        echo "somma dei 10 valori random dell'array \$r<br>";
        for($i=0;$i<count($r);$i++)
            {
                $somma=$r[$i] + $somma;
            }
            echo "somma totale: " .$somma;

        //trovare il valore max e min dell'array $r
    ?>
</body>
</html>