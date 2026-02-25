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
    <title> C R U D </title>
</head>

<body>
    Elenco utenti
    <form action="" method="GET">
        Nome: <input name="nome" type=text>
        <input type=submit value="Cerca">
    </form>

    <?php

    echo "<br><a href='inserimento.php'> Inserisci Utente</a><br>";

    try {
        //1 connessione
        $conn = new PDO($dsn, $user, $password);
        //echo "Connessione eseguita correttamente";

        //print_r($_REQUEST);
        $nome = "%";
        if (array_key_exists('nome', $_REQUEST))
            $nome = "%{$_REQUEST['nome']}%";


        //2 preparazione dello statement (query sql)
        $sql = "SELECT * FROM utenti 
                WHERE 
                    ute_nome LIKE :nome
                    OR 
                    ute_cognome LIKE :nome
                ORDER BY ute_cognome";
        $st = $conn->prepare($sql);

        //3 bind
        $st->bindParam(':nome', $nome);

        //4 esecuzione
        if (! $st->execute())
            echo "Errore di esecuzione della query";

        //5 estraggo i dati (solo in caso di SELECT)
        $records = $st->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Errore di connessione: " . $e->getMessage();
        $records = [];
    }

    echo "<br>";
    echo "<table>";
    //PER CASA
    //inserire un link sul cognome e nome per ordinare sul rispettivo campo
    echo "<tr>
            <th>Cognome</th>
            <th>Nome</th>
          </tr>";

    foreach ($records as $record) {
        echo "<tr>
            <td>{$record['ute_cognome']}</td>
            <td>{$record['ute_nome']}</td>";

        if (empty($record['ute_dimessoil']))
            echo "  <td><a href='modifica.php?id={$record['ute_id']}'> <img src='img/dimissioni.png' width=15 title='Clicca per dimettere in data odierna'>
                  </a>
                </td>";

        echo "</tr>";
    }

    echo "</table>";




    ?>
</body>

</html>