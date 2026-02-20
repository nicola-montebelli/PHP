<?php 
include_once('config/config.php');
try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);
        $id = $_REQUEST['id'];
        $ruolo = $_REQUEST['ruolo'];
        //2 preparazione dello statement (query sql)
        $sql = "UPDATE utenti SET ute_ruolo = :ruolo 
                WHERE ute_id != :id";
        $statement = $connessione->prepare($sql);

        //3 bind (specificata nella pagina dettaglio.php)
        $statement->bindParam(':ruolo', $ruolo);
        $statement->bindParam(':id', $id);

        //4 esecuzione di una query
        if(!$statement->execute())
            {
                echo "Errore dell'esecuzione della query";
            }

        //echo "<a href='index.php'</a>";
         header("Location: http://localhost/ifts25/PHP/verifica-FORM-20.02.26/index.php");  //attenzione al path                          
         exit();
    }
    catch(PDOException $e)
    {
        echo "Errore di Connessione: " . $e->getMessage() . "<br>";
    }

?>