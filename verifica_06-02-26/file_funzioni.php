<?php
//5 Definire una funzione che riceve in ingresso un array con i dettagli di un progetto e restituisce true se il progetto è attivo
//nell'anno corrente,altrimenti false

function progetto_valido($k,$v,$k2,$v2,$k3,$v3,$k4,$v4)
{
    $conto_progetti=0;
    if($v2 == date("Y"))
        {
            return true;
        }else return false;
}

//5 correzione in classe
function attivo($progetto,$anno = null) //cambiato per la consegna 7 -  $anno = null è opzionale ma se 
{
    if($anno == null)
        {
            $anno=date("Y");
        }
    //anno compreso tra inizio e inizio + durata
    //inizio <= anno <= inizio+durata($fine)
    $inizio = $progetto['inizio'];                          //data 'inizio' dell'array in ingresso
    //$anno = date("Y"); //cambiato per la consegna 7
    $fine = $inizio + $progetto['durata'];                  //la sommo alla 'durata' in una variabile $fine
    if($inizio <= $anno && $anno<=$fine)
        {
            return true;
        }else return false;
}

//6 correzione in classe
function attivi($array,$anno = null)
{
    //prende l'array bidimensionale
    $attivi=0;
    foreach($array as $a)
        {
            if(attivo($a,$anno))      //oppure  senza funzione già definita = if($a['inizio']<=date("Y") && date("Y") <= ($a['inizio'] + $a['durata']))
                {
                    $attivi++;
                }
        }
        return $attivi;
}



?>