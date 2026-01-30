<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 2 array associativo del 30.01.26</title>
    
</head>
<body>
    <?php 
        require("../funz/funzioni_esercizi.php"); //partire dalla cartella corrente

                                      //per includere nel file corrente un altro file (in questo caso il file che useremo per le funzioni)
                                      //include "copia e incolla" il contenuto del file incluso nel file corrente
                                      //esiste anche 'require'
                                      //include e require hanno l'estensione _once che è come un controllo nel caso il file sia stato già incluso in righe precedenti


        $p = ['prod1'=> 12.50,'prod2'=> 19.99,'prod3'=> 21.00,'prod4'=> 9.95];

        //7)-funzione che calcola il prezzo medio dei prodotti
        $media = media_array_associativo($p);
        if($media  === false){  
            echo " Array vuoto<br>";
        }else echo "media = &euro;" . number_format($media,2,",",".");

    echo"<hr>";
        
        //8)- aggiungere un nuovo valore all'array
        if(! my_array_key_exists('prod-new',$p))
            {
                $p['prod-new']=100;
            }
        print_r($p);

    echo "<hr>";

        //8a) aggiungi elemento prod-fz usando una funzione
        $p = aggiungi_elemento($p,'prod-fz',500);

        print_r($p);


    ?>
</body>
</html>