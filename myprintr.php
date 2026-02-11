<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funzione my printr</title>
</head>
<body>
    <?php 
        function my_printr($array)
        {
            $i=0;           //la keyword GLOBAL rende le variabili visibili anche dall'esterno alla funzione
            foreach($array as $chiave => $valore)
                {
                    if($chiave == $i)
                        {
                            echo " Array => ".$chiave;
                            $i++;
                        }
                    if(is_array($valore))
                        {
                            
                            my_printr($valore);
                        }
                    else
                        {
                            echo " [".$chiave."] => ";
                            echo " (".$valore.") ";
                        }
                }
        }
    ?>


<?php 
        $prodotti= [ ['nome'=>'prod1', 'prezzo'=>30, 'qta'=>5, 'ultimo_acquisto'=>'2023-03-14'],
                     ['nome'=>'prod2', 'prezzo'=>10, 'qta'=>7, 'ultimo_acquisto'=>'2024-01-12'],
                     ['nome'=>'prod3', 'prezzo'=>20, 'qta'=>0, 'ultimo_acquisto'=>'2023-12-28'] ];

        $p = ['prod1'=> 12.50,'prod2'=> 19.99,'prod3'=> 21.00,'prod4'=> 9.95];            

// foreach($p as $chiave => $valore)
//     {
//         echo "( " .$chiave;
//         echo " => ";            //printr fatto dall'utente
//         echo $valore .") ";     //per un array associativo
//     }
// echo "<hr>";
// foreach($prodotti as $key => $array)
//     {
//         echo "[Array ".$key."]"." => ";
//         foreach($array as $chiave => $valore)        //printr fatto dall'utente 
//             {                                        //per un array bidimensionale
//                 echo "(" .$chiave;
//                 echo " => ";            
//                 echo $valore .") ";
//             }
//     }

 my_printr($prodotti);
 echo "<hr>";
 print_r($prodotti);

?>
</body>
</html>