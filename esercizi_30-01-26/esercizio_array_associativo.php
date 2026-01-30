<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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

        
        echo "- Elencare in una tabella il nome prodotto (chiave) e il relativo prezzo (valore)<br>";
        echo "<table class='table table-striped table-hover'>";
        $i=0;
        foreach($p as $chiave_prod => $valore_prod)         //stampo la tabella con tanto di intestazione e con gli stili di bootstrap
            {
                if($i==0)
                    {
                        echo"<td style='background:#ccc'><b>Nome Prodotto:</b></td>";      //intestazione
                        echo"<td style='background:#ccc'><b>Prezzo:</b></td>";
                    }
                echo"<tr>";
                echo"<td>$chiave_prod</td>";            //corpo della tabella
                echo"<td>$valore_prod</td>";
                echo"</tr>";
                $i++;
            }
        
        echo "</table>";
    echo "<hr>";        //consegna 1 es.2


        echo "- Definire una funzione che calcola il prezzo medio dei prodotti<br>";
        $media = media_array_associativo($p);
        if($media  === false){  
            echo " Array vuoto<br>";
        }else echo "media = &euro;" . number_format($media,2,",",".");  //consegna 7 es.2

    echo"<hr>";
        
        echo " - Aggiungere un nuovo valore all'array<br>";
        if(! my_array_key_exists('prod-new',$p))
            {
                $p['prod-new']=100;
            }
        print_r($p);                                    //consegna 8 es.2

    echo "<hr>";

        echo " - Aggiungere un nuovo valore all'array tramite funzione definita dall'utente<br>";
        $p = aggiungi_elemento($p,'prod-fz',500);

        print_r($p);                                    //consegna 8a es.2
    echo "<hr>";
        
        echo "- Indicare quale prodotto è il più costoso e quello meno costoso <br>";
        $prezzo_maggiore = max_valore_array($p);
        echo"$prezzo_maggiore<br>";
        $prezzo_minore = min_valore_array($p);
        echo "$prezzo_minore<br>";
    echo "<hr>";                            //consegna 6 es.2
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>