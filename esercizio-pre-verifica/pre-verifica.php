<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione alla verifica</title>
</head>
<body>
    <?php 
        $a = [10,52,81,0,7,22,18,48];
        //si chiede di svolgere
        //1) elencare tutte le età presenti nell'array con uno sfondo alternato nelle varie righe,
        //scrivendo in grassetto le età dei maggiorenni e in corsivo quelle dei minorenni (0
        //corrisponde ad un neonato);

        foreach($a as $valori)
            {
                //echo $valori ." <br>";

                if($valori==0)
                    {
                        echo "<i style=\"background-color: pink;\">";
                        echo $valori ." è neonato<br>";
                        echo "</i>";
                    }
                else if($valori<18)
                    {
                        echo "<b style=\"background-color: yellow;\">";
                        echo $valori ."<br>";
                        echo "</b>";
                    }
                else
                    {
                        echo "<i style=\"background-color: green;\">";
                        echo $valori ."<br>";
                        echo "</i>";
                    }
            }
            echo "<hr>";

            //2)scrivere il numero dei neonati e l'età del più anziano;
            $neonati=0;
            for($i=0;$i<count($a);$i++)
                {
                    if($a[$i]==0)
                        {
                            $neonati++;     //conteggio dei neonati
                        }
                }
                if($neonati == 1)       //condizioni SE ci sono 0, 1 o più neonati
                    {
                        echo "C'è solo $neonati neonato<br>";
                    }
                if($neonati>1)
                    {
                        echo "I neonati sono: $neonati<br>";
                    }
                if($neonati == 0)
                    {
                        echo "Non ci sono neonati :( <br>";
                    }
            echo"<hr>";

            $etàAnziano=0;
            for($i=0;$i<count($a);$i++)     //controllo dell'età più alta nell'array
                {
                    if($a[$i]>$etàAnziano)          
                        {
                            $etàAnziano = $a[$i];
                        }else continue;
                }
                echo "Il più anziano ha $etàAnziano anni<br>";
            echo "<hr>";

            //3) calcolare e visualizzare l'età media dei maggiorenni.

            $sommaEtà=0;
            $media=0;
            $conteggioEtà=0;
            for($i=0;$i<count($a);$i++)
                {
                    if($a[$i]>=18)
                        {
                            $sommaEtà= $sommaEtà + $a[$i];
                            $conteggioEtà++;
                        }
                }
                $media= ($sommaEtà/$conteggioEtà);
                echo "Somma delle età > 18: $sommaEtà<br>";
                echo "Età media dei maggiorenni: $media su " . $conteggioEtà . " maggiorenni<br>";
            echo"<hr>";

            //4) Per aver diritto al voto si deve avere almeno 18 anni: calcolare e visualizzare quante schede servono in totale per le elezioni.

            $schede=0;
            for($i=0;$i<count($a);$i++)
                {
                    if($a[$i]>=18)
                        {
                            $schede++;
                        }
                }
                echo "Per le elezioni servono $schede schede perchè i maggiorenni sono $conteggioEtà<br>";
    
    ?>
</body>
</html>