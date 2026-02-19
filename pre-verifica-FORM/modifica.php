<?php 
include_once("include/config.php");


try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);

        //2 preparazione dello statement (query sql)
        $oggi = date("Y-m-d");
        $id = $_REQUEST['id'];
        $sql = "UPDATE utenti SET ut_dimesso = '$oggi' where utenteID = :id";
        $statement = $connessione->prepare($sql);

        //3 bind (specificata nella pagina dettaglio.php)
        $statement->bindParam(':id',$id);

        //4 esecuzione di una query
        if(!$statement->execute())
            {
                echo "Errore dell'esecuzione della query";
            }
         header("Location: http://localhost/PHP/pre-verifica-FORM/"); 
                                        //AGGIUNGERE /IFTS25/ A SCUOLA
         exit();
    }
    catch(PDOException $e)
    {
        echo "Errore di Connessione: " . $e->getMessage() . "<br>";
    }


?>

