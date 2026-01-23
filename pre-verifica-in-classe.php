<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-verifica in classe</title>
</head>
<body>
    <?php 
        $na=5;
        $a=[];
        $indiceNeonati=[];
        $maggiorenni=[];
        $indiceNome=[];
        $nomi=['Mario','Giovanni','Pippo','Ermete','Flautoberto'];
                 //0. inizializzazione array di età
        for($i=0;$i<$na;$i++)
            {
                $a[]=rand(0,110);
            }

                //1.Elenco delle età
        $neonato=0;
        $etaMassima=$a[0]; //oppure un operatore ternario $a? $a[0]:0;
        $sommaEta=0;
        $contaEta=0;
        $numMax=0;
        $min=111;
        $minVolte=0;

        for($i=0;$i<count($a);$i++)
            {
                $sfondo=($i%2)? "#cccc00":"#00cccc";    //colore a righe alternate
                $tag=($a[$i]>=18)?"b":"i";                  //bold se elemento i-esimo di $a è maggiore di 18 altrimenti italic
                echo"<div style='background:$sfondo'><$tag>". $a[$i]."</$tag></div>";
                // if($a[$i]>=18)
                //     {
                //         echo"<div style='background:#CCCC00'><b>". $a[$i]."</b></div>";
                //     }
                //     else
                //     {
                //         echo"<div style='background:#00cccc'><i>". $a[$i]."</i></div>";
                //     }
                

                //2. contare quanti 0 (neonati) appaiono nell'array
                //7. creare un array che contiene gli INDICI dei neonati
                if($a[$i]==0)
                    {
                        $neonato++;
                        $indiceNeonati[]=$i;
                    }
                //2.b trovare l'età massima
                if($a[$i]>$etaMassima)
                    {
                        $etaMassima=$a[$i];
                        $numMax=0;
                        $indiceNome=[];
                    }
                //5 contare quante volte compare il numero massimo 
                if($a[$i]==$etaMassima)
                    {
                        $numMax++;
                        $indiceNome[]=$i;
                    }
                if($a[$i]<$min)
                    {
                        $min=$a[$i];
                        $minVolte=0;
                    }
                if($a[$i]==$min)
                    {
                        $minVolte++;
                    }

                //3.calcolare l'età media dei maggiorenni  -> somma poi media (Somma/nElementi)
                //6. creare un array che contenga SOLO maggiorenni
                if($a[$i]>=18)
                    {
                        $sommaEta+=$a[$i];
                        $contaEta++;
                        //aggiungere in fondo all'array $maggiorenni
                        $maggiorenni[]=$a[$i];
                    }
                
            }
            echo "<br> i neonati sono: $neonato<br>";
            echo "Età massima: $etaMassima<br>"; //". Lui è " . $nomi[$indiceNome].".<br>";

            for($i=0;$i<count($indiceNome);$i++)        //stampare il nome che corrisponde all'indice dell'età massima 
                {
                    echo $nomi[$indiceNome[$i]] ." ";
                }


            echo"<br>";
                if($contaEta==0)    //stampare la media
                    {
                        echo "Non ci sono maggiorenni<br>";
                    } else echo "Media delle età: ". ($sommaEta/$contaEta) ."<br>";

                //4.calcolare la percentuale dei votanti (n-maggiorenni / totale *100)
                echo "La percentuale dei votanti: " . (($contaEta/count($a))*100)."%<br>";
            echo "Numero Età Massima $numMax <br>";

            echo "<br> array di solo maggiorenni<br>";
            print_r($maggiorenni);
            echo"<br>";
            echo"array dei neonati<br>";
            print_r($indiceNeonati);
            echo"<br> Età minima apparsa nell'array: $min" ." E' apparsa $minVolte";
            

    ?>
</body>
</html>