<?php 
include_once("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettaglio Utente</title>
</head>
<body>
    <?php 
    try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);
        //echo "Connessione eseguita con successo!!!<br>";

        //2 preparazione dello statement (query sql)
        $id = $_REQUEST['id']; //id nella pagina elenco-utenti.php nell'href è uguale a $record['utenteID']
        $statement = $connessione->prepare("SELECT * FROM utenti WHERE utenteID = :id"); //:id è un "placeholder" le variabili nella query sono PERICOLOSE
        //un problema è che nell'url qualcuno potrebbe scrivere del codice sql dannoso per il database (SQL injector)

        //3 bind per correttezza del codice è FONDAMENTALE
        $statement->bindParam(':id',$id,PDO::PARAM_INT);  //cerca :id nella query e la va a sostituire con $id   PDO::PARAM_INT si aspetta un INT
        //!!! il numero di bind deve corrispondere ai placeholder differenti definiti nella query (:id :nome 2 bind   :id :id  1 bind)

        //4 esecuzione di una query
        $statement->execute();

        //5 restituzione dei dati: 
        //con fetch $record è un array associativo monodimensionale
        $record = $statement->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
        echo "Errore di Connessione: " . $e->getMessage() . "<br>";
        $recordo =[];
    }
    if(!$record)
        {
            echo "Nessun record estratto con ID: $id";
            echo "<br>";
            echo "<a href='elenco-utenti.php'> Torna all'elenco utenti </a>";
        }
    foreach($record as $k => $v)
        {
            echo "$k : $v<br>";
        }
    
    ?>
</body>
</html>