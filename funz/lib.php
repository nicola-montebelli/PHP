<?php
function data_db2utente($data){     //converte una data YYYY-mm--dd in dd/mm/YYYY
    $d = explode('-',$data);
    return "$d[2]/$d[1]/$d[0]";  //restituisce una data dd/mm/YYYY
                                //explode separa la stringa in piccoli pezzi ogni volta che incontra il separatore in ingresso
}



?>