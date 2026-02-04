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

function max_valore_array($a)
{
    $valore_massimo=0;
    foreach($a as $chiave => $valore)
        {
            if($valore_massimo < $valore){
                $valore_massimo = $valore;
            }else continue;
            if($valore_massimo == max($a))
                {
                    return "$chiave vale $valore_massimo";
                }
        }  
}

function min_valore_array($a)
{
    $valore_minimo= +INF;
    foreach($a as $chiave => $valore)
        {
            if($valore < $valore_minimo)        
                {                               
                    $valore_minimo = $valore;   
                }else continue;
            if($valore_minimo == min($a))
                {
                    return "$chiave vale $valore_minimo";
                }
        }
}
        //5-6-7)- Definire una funzione che calcola la media dei valori di una chiave in ingresso
function media_in_array(array $a,string $k)
{
    if(count($a)== 0)
        {
            return "Non ci sono valori da calcolare";
        }
    $somma_tot=0;
    foreach($a as $dato)
        {
            if(is_numeric($dato[$k]))
                {
                    $somma_tot += $dato[$k];
                }else return "Non è possibile calcolare la media di '$k'";
        }
        return "La media è: " . $somma_tot/count($a);
}

function aggiungi_elemento_multi($a,$k,$v,$k2,$v2,$k3,$v3,$k4)  //8)- Aggiungere un array in fondo all'array tramite funzione
{
    $a[count($a)]=[$k => $v, $k2 => $v2, $k3 => $v3, $k4 => date("Y-m-d")];
    return $a;
}
?>