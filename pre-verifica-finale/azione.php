<?php 
session_start();
define('MAXSELECT', 500);
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
            if(! isset($_SESSION['n_select']))
                {
                    $_SESSION['n_select'] = 0;
                } 
            if($_SESSION['n_select'] >= MAXSELECT)
                {
                    echo "Non puoi più usare il servizio di ricerca. <a href='#'>PAGAH</a><br>";
                    exit();
                }
                $_SESSION['n_select']++;  //numero di volte in cui si fa la ricerca della mail
            try
            {
                //1 connessione al database
                $conn = new PDO($dsn, $user, $pass);

                //2 preparazione  dello statement (query sql)
                // $sql = "SELECT * FROM utenti WHERE ute_mail LIKE :mail";
                // $st = $conn -> prepare($sql);
                // $st -> bindParam(':mail', $mail);

                //elencare gli utenti con il ruolo user
                $sql = "SELECT * 
                        FROM utenti
                        INNER JOIN ruoli ON  ute_ruo_id = ruo_id 
                        WHERE ute_mail LIKE :mail
                        AND ute_ruo_id != 1";

                $st = $conn -> prepare($sql);

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
                echo $record['ruo_nome']." (".$record['ruo_id'].")";
                echo "<a href='dettagli.php?id={$record['ute_id']}'> dettagli</a>";
                echo "<br>";  

                //PER CASA 
                //consegna dell'esercizio scritta su classroom in esercizio completo PLUS (verifica)
            }
        }
    ?>
<a href="index.php">Torna alla ricerca</a>
</body>
</html>