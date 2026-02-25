<?php
session_start();
include_once("utilità.php");
Utilita::autenticato();
include_once("inc/config.php");


try {
    $conn = new PDO($dsn, $user, $password);

    //2 preparazione dello statement (query sql)
    $oggi = date("Y-m-d");
    $id = $_REQUEST['id'];
    $sql = "UPDATE utenti SET ute_dimessoil= '$oggi' WHERE ute_id = :id ";
    $st = $conn->prepare($sql);

    //3 bind
    $st->bindParam(':id', $id);

    //4 esecuzione
    if (! $st->execute())
        echo "Errore di esecuzione della query";

    header("Location: index.php");
} catch (PDOException $e) {
    echo "Errore di connessione: " . $e->getMessage();
}
