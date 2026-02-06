<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica del 06.02.26 - Montebelli Nicola</title>
</head>
<body>
<?php 
include_once("file_funzioni.php");
    $progetti=[['nome'=>'Marketing','inizio'=>'2020','durata'=>4,'partecipanti'=>30]
               ,['nome'=>'Finanza','inizio'=>'2021','durata'=>3,'partecipanti'=>28]
               ,['nome'=>'Automazione','inizio'=>'2023','durata'=>5,'partecipanti'=>31]
               ,['nome'=>'AI','inizio'=>'2024','durata'=>2,'partecipanti'=>22]];

    //1 Elencare i nomi di tutti i progetti
    echo "Nomi dei progetti dell'Enaip:<br>";
    echo "<ul>";
    foreach($progetti as $chiave => $progetto)
        {
            echo "<li>".$progetto['nome'] ."</li>";
        }
    echo "</ul>";
    echo "<hr>";

    //2 calcolare il numero medio di durata di progetti
    $contatore=0;
    $somma=0;
    foreach($progetti as $chiave => $progetto)
        {
            if(isset($progetto['durata']))
                {
                    $somma += $progetto['durata'];
                    $contatore++;
                }
        }
    echo "La media della durata dei progetti è: ". "<b>".($somma/$contatore)."</b>" ."<br>";
    echo "<hr>";

    //3 Indicare l'anno del progetto iniziato per primo. Elencare i progetti iniziati quell'anno
    $anno = date("Y",strtotime("+1 year"));
    $nome_progetto;
    $progetti_paralleli=[];
    foreach($progetti as $chiave => $progetto)
        {
            if($progetto['inizio']<$anno)
                {
                    $anno = $progetto['inizio'];
                    $nome_progetto =$progetto['nome'];
                    $progetti_paralleli=[];
                }
            if($progetto['inizio'] == $anno)
                {
                    $progetti_paralleli[] = $progetto['nome'];
                }
        }

    echo "Il progetto ".$nome_progetto." è quello iniziato per prima nell'anno ".$anno."<br>";
    //3a
    echo "Lista delle date dei progetti che sono iniziati lo stesso anno ($anno): <br>";
    echo "<ul>";
    foreach($progetti_paralleli as $nome)
        {
            echo "<li>".$nome."</li>";
        }
    echo "</ul>";
    echo "<hr>";

    //4 Aggiungere il progetto PHP iniziato oggi con durata 1 anno e partecipanti in numero casuale tra 10 e 30
    $partecipanti_rnd = rand(10,30);
    $progetti[]= ['nome'=>'PHP','inizio'=>(date("Y")+1),'durata'=>1,'partecipanti'=>$partecipanti_rnd];
    print_r($progetti);
    echo "<hr>";

    //5 Definire una funzione che riceve in ingresso un array con i dettagli di un progetto e restituisce true se il progetto è attivo
    //nell'anno corrente,altrimenti false
    $controllo = progetto_valido('nome','nuovo2','inizio','2026','durata',3,'partecipanti',28);
    if($controllo == true)
        {
            echo "Il progetto è di quest'anno";
        }else echo "Il progetto non è di quest'anno";
    echo "<hr>";


    //5 correzione
    $p= $progetti[3];   //passiamo un array singolo dell'array multidimensionale $progetti in $p
    echo "progetto ".$p['nome']." attivo?<br>".attivo($p);      //stampa 1 se è vero non stampa nulla se false
    echo "<hr>";


    //6 in classe
    echo "n. progetti attivi nell'anno corrente ". date("Y")." : ".attivi($progetti); //3 valori $prodotti[3,4,5]
    echo "<hr>";

    //7 in classe
    echo "n. progetti attivi nell'anno ". (date("Y")-4)." : ".attivi($progetti,(date("Y")-4)); //cambiando i valori 'inizio' con date oltre il 2026 funziona perchè ne conta 0
                                                                                        //ma ci sono dei dubbi per quando i valori 'inizio' sono sotto il 2026 (come era l'array di base)

    //controllare il file che carica la prof su classroom


?>
</body>
</html>