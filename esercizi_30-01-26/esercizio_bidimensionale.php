<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php 
        include("../funz/funzioni_esercizi.php");

        $prodotti= [ ['nome'=>'prod1', 'prezzo'=>30, 'qta'=>5, 'ultimo_acquisto'=>'2023-03-14'],
                     ['nome'=>'prod2', 'prezzo'=>10, 'qta'=>7, 'ultimo_acquisto'=>'2024-01-12'],
                     ['nome'=>'prod3', 'prezzo'=>20, 'qta'=>0, 'ultimo_acquisto'=>'2023-12-28'] ];
 
        //1)- Elencare in una tabella i dati di tutti i prodotti
        echo "<table class='table table-success'>";
        if($prodotti)
            {
                foreach($prodotti[0] as $chiave => $valore)
                    {
                        echo "<td><b>$chiave</b></td>";
                    }
            }else echo "Non esistono valori da considerare<br>";
        foreach($prodotti as $prodotto)
            {
                echo "<tr>";
                foreach($prodotto as $dato)
                    {
                        echo "<td>$dato</td>";
                    }
                echo "</tr>";
            }
        echo "</table>";        //fine 1
    echo "<hr>";

        //2)- Elencare tutti i prodotti con qta nulla
        foreach($prodotti as $chiave => $prodotto)
            {
                        if($prodotto['qta'] == 0)
                            {
                                echo "Prodotto ". $prodotto['nome'] ." ha quantità " . $prodotto['qta']."<br>";
                            }
            }       //fine 2
    echo "<hr>";

        //3-4)- Scrivere il nome del prodotto acquistato meno di recente e la relativa data di ultimo acquisto
        $data_meno_recente = null;
        $data_odierna = date("Y-m-d");
        echo "Data Odierna: $data_odierna <br>";
        $nome_recente=null;

        foreach($prodotti as $chiave => $prodotto)
            {
                echo"Nome prodotto: " .$prodotto['nome']. ". Ultimo acquisto: ".$prodotto['ultimo_acquisto']. "<br>"; 

                if($data_meno_recente == null || $data_meno_recente > $prodotto['ultimo_acquisto'])
                    {
                        $data_meno_recente=$prodotto['ultimo_acquisto'];
                        $nome_recente=$prodotto['nome'];
                    }
            }
            echo "<br> Data meno recente: ";
            echo"Nome prodotto: " .$nome_recente . ". Ultimo acquisto: ".$data_meno_recente. "<br>";    //fine 3
    echo "<hr>";


        //5-6-7)- Definire una funzione che calcola la media dei valori di una chiave in ingresso
        $media = media_in_array($prodotti,'prezzo');
        echo "$media<br>";
    echo "<hr>";


        //8)- Aggiungere un array in fondo all'array tramite funzione
        $prodotti = aggiungi_elemento_multi($prodotti,'nome',"prod4",'prezzo',8,'qta',25,'ultimo_acquisto');
        print_r($prodotti);
    echo "<hr>";


        //9)- aggiornare la data 'ultimo_acquisto' del 'prod2' al mese scorso e la 'qta' a 20
        $prodotti[1]['qta'] = 20;
        print_r($prodotti);
        echo "<br>";

        $date = date_create($prodotti[1]['ultimo_acquisto']); //converte la stringa in dateTime object per far funzionare datesub()  //https://www.w3schools.com/php/func_date_date_sub.asp
        if($date == false)
            {
                echo "Non posso farlo :( <br>";
            }
            else
            {
                date_sub($date,date_interval_create_from_date_string("1 months"));  //sottrae la quantità indicata
                echo date_format($date,"Y-m-d") ."<br>";
            }

            //alternativa InstanceOf Datetime

            if($date instanceof DateTime)  //controlla se $date è un istanza di DateTime (vero se date_create ritorna l'oggetto dateTime)
            {
                date_sub($date,date_interval_create_from_date_string("1 months"));  //sottrae la quantità indicata
                echo date_format($date,"Y-m-d")."<br>";
            }
            else
            {
                echo "Non posso farlo :( <br>";
            }
    echo "<hr>";

            //10)-Calcolare i valori medi di 'prezzo' e 'qta' (come i punti 5-6-7)
            print_r($prodotti);
            echo "<br>";
            $media_prezzo = media_in_array($prodotti,'prezzo');
            echo "$media_prezzo per il prezzo<br>";

            $media_qta = media_in_array($prodotti,'qta');
            echo "$media_qta per le quantità<br>";

    echo "<hr>";
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>