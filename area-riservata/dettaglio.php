<?php
session_start();
include_once("utilità.php");
Utilita::autenticato();
include_once("inc/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettaglio</title>
</head>

<body>
    <?php
    try {
        //1 connessione
        $conn = new PDO($dsn, $user, $password);
        //echo "Connessione eseguita correttamente";

        //2 preparazione dello statement (query sql)
        $id = $_REQUEST['id']; //valore potenzialmente pericoloso!!!!

        $nome = "";
        if (isset($_REQUEST['nome']))
            $nome = $_REQUEST['nome'];

        //$id = "3; DELETE ..."; ATTENZIONA a SQL-injector
        $st = $conn->prepare("SELECT * FROM utenti WHERE ute_id = :id 
                OR ute_nome = :nome ");

        //3 bind: n. di bind deve coincidere con il n. di token (segnaposti, es. :id) 
        $st->bindParam(':id', $id, PDO::PARAM_INT);
        $st->bindParam(':nome', $nome);

        //4 esecuzione
        if (! $st->execute())
            echo "Errore di esecuzione della query";

        //5 estraggo i dati
        //IMP al max 1 record (1 o nessuno)
        //$record: array associativo MONOdimensionale
        $record = $st->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Errore di connessione: " . $e->getMessage();
        $record = [];
    }

    if (! $record) {
        echo "Nessun record estratto con id = $id";
        echo "<br><a href='elenco.php'> Torna all'elenco </a>";
        exit;
    }
    //se sono qui, ho estratto il record
    //print_r($record);
    foreach ($record as $k => $v) {
        if ($k == "...") {
            $v = "...";
        }
        echo "$k: $v<br>";
    }



    ?>
</body>

</html>