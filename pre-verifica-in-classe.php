<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-verifica in classe</title>
</head>
<body>
    <?php 
        $na=20;
        $a=[];
                 //0. inizializzazione array di età
        for($i=0;$i<$na;$i++)
            {
                $a[]=rand(0,110);
            }

                //1.Elenco delle età
        $neonato=0;
        $etaMassima=$a[0]; //oppure un operatore ternario $a? $a[0]:0;
        $sommaEta=0;
        $media=0;
        $contaEta=0;
        for($i=0;$i<count($a);$i++)
            {
                $sfondo=($i%2)? "#cccc00":"#00cccc";    //colore a righe alternate
                $tag=($a[$i]>=18)?"b":"i";              
                echo"<div style='background:$sfondo'><$tag>". $a[$i]."</$tag></div>";
                // if($a[$i]>=18)
                //     {
                //         echo"<div style='background:#CCCC00'><b>". $a[$i]."</b></div>";
                //     }
                //     else
                //     {
                //         echo"<div style='background:#00cccc'><i>". $a[$i]."</i></div>";
                //     }
                

                //2. contare quanti 0 appaiono nell'array
                if($a[$i]==0)
                    {
                        $neonato++;
                    }
                //2.b trovare l'età massima
                if($a[$i]>$etaMassima)
                    {
                        $etaMassima=$a[$i];
                    }

                //3.calcolare l'età media dei maggiorenni  -> somma poi media (Somma/nElementi)
                if($a[$i]>=18)
                    {
                        $sommaEta+=$a[$i];
                        $contaEta++;
                    }
                
            }
            echo "<br> i neonati sono: $neonato<br>";
            echo "Età massima: $etaMassima<br>";
            if($contaEta==0)
                {
                    echo "Non ci sono maggiorenni<br>";
                } else echo "Media delle età: ". ($sommaEta/$contaEta) ."<br>";
            
            
        
    ?>
</body>
</html>