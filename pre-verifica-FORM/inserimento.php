<?php 
include_once("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento di nuovi utenti</title>
</head>
<body>
    
    <?php 
if($_POST)
{
    //in $_POST ci sono i dati dell'utente da inserire
  try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);
        //echo "Connessione eseguita con successo!!!<br>";

        //2 preparazione dello statement (query sql)
        $nome = $cognome = $mail = $natoil ="";
    
        $nome = "{$_REQUEST['nome']}";
        $cognome = "{$_REQUEST['cognome']}";
        $mail = "{$_REQUEST['mail']}";
        $natoil = "{$_REQUEST['natoil']}";
        
        $sql = "INSERT INTO utenti (ut_nome, ut_cognome, ut_mail, ut_data) VALUES (:nome, :cognome, :mail, :natoil)";
        $statement = $connessione->prepare($sql);

        //3 bind (specificata nella pagina dettaglio.php)
        $statement->bindParam(':nome',$nome);
        $statement->bindParam(':cognome',$cognome);
        $statement->bindParam(':mail',$mail);
        $statement->bindParam(':natoil',$natoil);

        //4 esecuzione di una query
        if(!$statement->execute())
            {
                echo "Errore dell'esecuzione della query";
            }
        else
            {
                echo "Utente inserito correttamente";
                header("Location: http://localhost/ifts25/PHP/pre-verifica-FORM/"); //funzione che redirecta a una pagina definita 
                exit();
                //andare a una pagina specifica (index.php)
            }
        
    }
    catch(PDOException $e)
    {
        echo "Errore di Connessione: " . $e->getMessage() . "<br>";
    }
}
     ?>

<a href="index.php">Torna all'elenco</a>
<h1>Inserisci un nuovo utente</h1>
<form action="" method="POST">
        Cognome <input type="text" name="cognome"><br>
        Nome    <input type="text" name="nome"><br>
        Mail    <input type="email" name="mail"><br>
        Data Nascita <input type="date" name="natoil"><br>

        <input type="submit" value="Inserisci">
</form>
</body>
</html>