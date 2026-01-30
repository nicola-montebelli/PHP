<?php
//php per scrivere funzioni per gli esercizi

function media_array_associativo($a)
{
    $somma=0;
    foreach($a as $v)
        {
            $somma += $v;
        }
    if(count($a)>0){
        return $somma / count($a);
    }
    return false;  //equivale a un else 
}
/**/
function my_array_key_exists($k,$a){        //7)
    foreach($a as $chiave => $valore){
        if ($k ==$chiave)
            {
                return true;
            }
    }
    //se sono qui la chiave non è stata trovata
    return false;
}

/**
 * La funzione aggiunge un elemento all'array, con chiave e valore
 * @param array $a array a cui aggiungere l'elemento
 * @param string|int $k chiave del nuovo elemento
 * @param string|int|float $v valore del nuovo elemento
 * @return array $a aggiornato con il nuovo valore
 */

function aggiungi_elemento($a,$k,$v)        //8a)
{
    $a[$k]= $v;
    return $a;
}
?>