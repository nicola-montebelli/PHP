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
    $anno_min = date("Y",strtotime("+1 year"));
    $nome_progetto;
    $progetti_paralleli=[];
    foreach($progetti as $chiave => $progetto)
        {
            if($progetto['inizio']<$anno_min)
                {
                    $anno_min = $progetto['inizio'];
                    $nome_progetto =$progetto['nome'];
                    $progetti_paralleli=[];
                }
            if($progetto['inizio'] == $anno_min)
                {
                    $progetti_paralleli[] = $progetto['nome'];
                }
        }

    echo "Il progetto ".$nome_progetto." è quello iniziato per prima nell'anno ".$anno_min."<br>";
    //3a
    echo "Lista delle date dei progetti che sono iniziati lo stesso anno ($anno_min): <br>";
    echo "<ul>";
    foreach($progetti_paralleli as $nome)
        {
            echo "<li>".$nome."</li>";
        }
    echo "</ul>";
    echo "<hr>";

    //4 Aggiungere il progetto PHP iniziato oggi con durata 1 anno e partecipanti in numero casuale tra 10 e 30
    $partecipanti_rnd = rand(10,30);
    $progetti[]= ['nome'=>'PHP','inizio'=>date("Y"),'durata'=>1,'partecipanti'=>$partecipanti_rnd];
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
    echo "n. progetti attivi nell'anno ". (date("Y"))." : ".attivi($progetti,(date("Y"))); //cambiando i valori 'inizio' con date oltre il 2026 funziona perchè ne conta 0
                                                                                        //ma ci sono dei dubbi per quando i valori 'inizio' sono sotto il 2026 (come era l'array di base)
    //controllare il file che carica la prof su classroom
    echo"<hr>";

    //7a
    $max = 0;
    $anno_max_progetti = 0;
    $anno = 0;
    $j = 0;
    for ($i = $anno_min; $i <= date("Y"); $i++) {       //i=2020,          //i=2021                     //i=2022                //i=2023                //i=2024            //i=2025                //i=2026
        $anno = $i; //$anno_min + $j;                    //anno=2020+0(j),  //anno=2020+1(j)             //anno=2020+2           //anno=2020+3           //anno=2020+4       //anno=2020+5           //anno=2020+6
        //$j++;                                         //j=1              //j=2                        //j=3                   //j=4                   //j=5               //j=6                   //j=7
        $attivi = attivi($progetti, $anno);    //corsi attivi nel 2020 = 1 //attivi nel 2021 = 2        //attivi nel 2022=2     //attivi=3              //attivi=4          //attivi=2              //attivi=3
        if ($attivi > $max) {                   //1(attivi) > 0(max)       //2>1(max)                   //2>2                   //3>2                   //4>3               //2>4                   //3>4
            $max = $attivi;                     //max = 1                  //max = 2                    //ricomincia il ciclo   //max=3                 //max=4             //ricomincia il ciclo   //FINE CICLO
            $anno_max_progetti = $anno;         //anno_max=2020            //anno_max = 2021                                    //anno_max=2023         //anno_max=2024
            //$anni_max_progetti = [];          //array svuotato           //array svuotato                                     //array svuotato        //array svuotato
        }
        // if ($attivi == $max) {               //1==1                     //2==2                                               //3==3                  //4==4
        //     $anni_max_progetti[] = $anno;    //array=2020               //array=2021                                         //array=2023            //array=2024
        // }
    }
    echo "Anno con max progetti attivi ($max) tra $anno_min e " . date("Y") . ": " . $anno_max_progetti; //i progetti attivi maggiori sono nell'ano 2024
    // foreach ($anni_max_progetti as $anno_max) {
    //     echo "<br>" . $anno_max;                     //è irrilevante creare un array che stampi sempre la stessa data più volte
    // }
    echo "<hr>";
   
?>
</body>
</html>