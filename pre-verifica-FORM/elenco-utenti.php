<?php 
include_once("include/config.php");

function anno_corrente($data)
{
    $data_anno = substr($data,0,4);
    $anno = date("Y");
    if($anno == $data_anno) return true;
    return false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Utenti</title>
</head>
<body>
<?php 
    try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);
        echo "Connessione eseguita con successo!!!<br>";

        //2 preparazione dello statement (query sql)
        $statement = $connessione->prepare("SELECT * FROM utenti ORDER BY ut_cognome");

        //3 bind (lo faremo)

        //4 esecuzione di una query
        $statement->execute();

        //5 restituzione dei dati
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
        echo "Errore di Connessione: " . $e->getMessage() . "<br>";
    }

    print_r($records);
    //1 Indicare il numero di record presenti nella tabella utenti e l’elenco degli utenti.
    echo "<hr>";
    echo "Numero di elementi della tabella utenti :" .count($records);
    echo "<ul>";
    //2 Definire la funzione che, dati in ingresso una data restituisca true se la data passata in input è nello stesso anno dell’anno corrente, false altrimenti
    foreach($records as $record)
        {
            echo "<li>$record[ut_nome] "." $record[ut_cognome] ";
            if(anno_corrente($record['ut_data']))
             echo " - NEONATO ";
            //3 Inserire un link sui record del punto 1 alla pagina ./dettaglio.php passando l’id del record.
            echo "<a href='dettaglio.php?id=$record[utenteID]'>dettagli</a>";
            echo "</li>";
        }
    echo "</ul>";
?>
</body>
</html>