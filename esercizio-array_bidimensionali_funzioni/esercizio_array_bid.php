<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 3 del 30.01.26 fatto in classe</title>
</head>
<body>
    <?php 
    include_once("../funz/lib.php");

    //12
    function media_in_array($array,$key){

        if(empty($array))
        {
            return 0;
        }
            $somma=0;
            $n_elementi=0;
        foreach($array as $a)
        {
            if(array_key_exists($key,$a))
            {
                $somma += $a[$key];
                $n_elementi++;
            }else continue;
        }
            $ris = $n_elementi > 0 ? $somma / $n_elementi : 0;
            return $ris;  
    }

        $prodotti= [ ['nome'=>'prod1', 'prezzo'=>30, 'qta'=>5, 'ultimo_acquisto'=>'2023-03-14'],
                     ['nome'=>'prod2', 'prezzo'=>10, 'qta'=>7, 'ultimo_acquisto'=>'2020-12-28'],
                     ['nome'=>'prod3', 'prezzo'=>20, 'qta'=>0, 'ultimo_acquisto'=>'2020-12-28'] ];


        //16
        foreach($prodotti as $key => $prodotto)
        {
            if($prodotto['nome'] == 'prod2')
            {
                $prodotti[$key]['qta'] = 20;
            }
        }


         $minore = date("Y-m-d",strtotime('+1 day')); //maggiore data possibile (domani)
         //$minore_nome= "nessun prodotto trovato";
           $minore_nomi=[];


        //1
        echo "<table border =1>";
        echo"<tr><th>Nome</th>";
        echo"<th>Prezzo</th>";
        echo"<th>Quantità</th>";
        echo"<th>Ultimo Acquisto</th></tr>";
        foreach($prodotti as $prodotto)
            {
                echo "<tr>";
                foreach($prodotto as $k => $v)
                    {
                        if($k == 'ultimo_acquisto')
                            {
                                $v = data_db2utente($v);
                            }
                        echo "<td>$v</td>";
                    }
                echo "</tr>";

    //10 scrivere il nome del prodotto acquistato meno di recente (cioè con ‘ultimo_acquisto’ minore) e la relativa data di ultimo acquisto
                if($prodotto['ultimo_acquisto']<$minore)
                {
                    $minore = $prodotto['ultimo_acquisto'];
                    $minore_nome = $prodotto['nome'];
                    $minore_nomi=[];
                }

                //11 per il punto precedente verificare se ci sono più prodotti e scriverli tutti
                if($prodotto['ultimo_acquisto'] == $minore)
                {
                    $minore_nomi[]=$prodotto['nome'];
                }
            }
        echo"</table>";
        echo "<hr>";

        //9
        echo "Elenco dei prodotti con quantità nulla<ol>";
        foreach($prodotti as $prodotto)
            {
                if($prodotto['qta'] == 0)
                {
                    echo"<li>". $prodotto['nome'];
                }
            }
        echo"</ol>";
        echo "<hr>";

        //10
       echo "$minore_nome ha data $minore. E' il meno recente.<br>";

    //11
       echo"Lista di prodotti acquistati meno di recente:";
       echo "<ol>";
       foreach($minore_nomi as $nome)
        {
            echo "<li>".$nome." in data " .$minore;
        }
        echo "</ol>";
        echo "<hr>";

        //13
        echo "Media dei prezzi: " .number_format(media_in_array($prodotti,'prezzo'),2,",",".") ." €";
        echo "<br>";
        //14
        echo "Media delle quantità: " .number_format(media_in_array($prodotti,'qta'),0);
        echo "<br>";
        echo "<hr>";

        //15 
        $prodotto_nuovo;
        $prodotto_nuovo =  ['nome'=>'prod4', 'prezzo'=>150, 'qta'=>9, 'ultimo_acquisto'=>data_db2utente(date("Y-m-d",strtotime('-1 day')))];
        $prodotti[] = $prodotto_nuovo;
        print_r($prodotti);
        echo "<hr>";

        
    ?>
</body>
</html>