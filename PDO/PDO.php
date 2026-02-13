<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO PHP Data Object - Connessione al Database</title>
</head>
<body>
<?php 
    $host = "localhost";
    $dbname = "ifts2026";
    $user = "root";
    $pass = "";
    $dsn="mysql:host=$host;dbname=$dbname"; //stringa di connessione al database  


    try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);
        echo "Connessione eseguita con successo<br>";

        //2 preparazione dello statement (query sql)
        $statement = $connessione->prepare("SELECT * FROM utenti");

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

    echo "Numero di record della tabella address: ". count($records)."<br>";
    print_r($records);
    echo "<hr>";

    echo"<table>";
    foreach($records as $record)
        {
          echo "<tr>
                    <td>{$record['utenteID']}</td>      
                    <td>{$record['ut_nome']}</td>
                    <td>{$record['ut_cognome']} </td>
                    <td> <a href='../form/azione.php?nome={$record['ut_nome']}'> clicca qui </a></td>
                </tr>";
        }                   //le {} nell'echo è come la concatenazione per stampare elementi di array associativi
    echo"</table>";
    

?>
</body>
</html>