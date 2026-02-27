<?php 
include_once("config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-verifica del 06.02.26 - Action</title>
</head>
<body>
    <?php 
    if(!isset($_REQUEST['mail']))
        {
            echo "Devi inserire una mail";
        }
        else
        {
            $mail = "%".$_REQUEST['mail']."%";
            try
            {
                //1 connessione al database
                $conn = new PDO($dsn, $user, $pass);
                //2 preparazione  dello statement (query sql)
                $sql = "SELECT * FROM utenti WHERE ute_mail LIKE :mail";
                $st = $conn -> prepare($sql);
                //3 bind
                $st -> bindParam(':mail', $mail);
                //4 esecuzione dello statement
                $st -> execute();
                //restituzione dei dati
                $records = $st -> fetchAll(PDO::FETCH_ASSOC);  //fetchAll restituisce TUTTI i record del db in un array associativo
                                                               //fetch restituisce solo 1 record (guardare php.net per più informazioni)
            }
            catch(PDOException $e)
            {
                echo "Errore di connessione".$e -> getMessage();
                $records = [];
            }
    
            foreach($records as $record)
            {
                echo "{$record['ute_nome']} ";
                echo "{$record['ute_cognome']} - ";
                echo $record['ute_mail']." - ";
                echo $record['ute_natoil']." - ";
                echo $record['ute_ruolo']." - ";
                echo $record['ute_reparto']."<br>";
            }
        }
    ?>
</body>
</html>