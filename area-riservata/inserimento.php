<?php
include_once("inc/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento</title>
</head>

<body>


    <?php

    if ($_POST) {
        //in $_POST ci sono i dati dell'utente da inserire

        try {
            //1 connessione
            $conn = new PDO($dsn, $user, $password);

            $nome = $cognome = $mail = $natoil = "";
            //if (array_key_exists('nome', $_REQUEST))
            $nome = $_REQUEST['nome'];
            //if (array_key_exists('cognome', $_REQUEST))
            $cognome = $_REQUEST['cognome'];
            $mail = $_REQUEST['mail'];
            $natoil = $_REQUEST['natoil'];


            $sql = "INSERT INTO utenti 
                    (ute_nome, ute_cognome, ute_mail, ute_natoil) 
                    VALUES 
                    (:nome, :cognome, :mail, :natoil)";
            $st = $conn->prepare($sql);

            //3 bind
            $st->bindParam(':nome', $nome);
            $st->bindParam(':cognome', $cognome);
            $st->bindParam(':mail', $mail);
            $st->bindParam(':natoil', $natoil);

            //4 esecuzione
            if (! $st->execute())
                echo "Errore di esecuzione della query";
            else {
                echo "utente inserito correttamente!";
                //vai ad una pagina specifica!!!
                header("Location: elenco.php");
            }
        } catch (PDOException $e) {
            echo "Errore di connessione: " . $e->getMessage();
        }
    }
    ?>


    <br>
    <a href='elenco.php'>Torna all'elenco</a>
    <h1>Inserimento nuovo utente</h1>
    <form action="" method="POST">

        Cognome <input type="text" name="cognome"><br>
        Nome <input type="text" name="nome"><br>
        Mail <input type="email" name="mail"><br>
        Data di nascita <input type="date" name="natoil"><br>

        <input type="submit" value="Inserisci">
    </form>

</body>

</html>