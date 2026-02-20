<?php 
include_once("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio pre-verifica sui FORM del 13.02.26 - C R U D</title>
</head>
<body>
    <!-- 4 , 5 , 6 -->
    <form action="" method="GET" id="redirect"> <!-- action="" riferisce SE STESSA-->
        Nome: <input type="text" name="nome">
        <input type="submit" value="Cerca">
    </form>
<?php 
echo "<a href='inserimento.php'>Inserisci Utente</a><br>";
 try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);
        //echo "Connessione eseguita con successo!!!<br>";

        //2 preparazione dello statement (query sql)
        $nome="%";
        if(array_key_exists('nome',$_REQUEST))
            {
                $nome = "%{$_REQUEST['nome']}%";   
            }
        $sql = "SELECT * FROM utenti        /*trova i nomi e cognomi che contengono le lettere che vengono scritte nella textbox*/
                WHERE ut_nome LIKE :nome
                OR ut_cognome LIKE :nome
                ORDER BY ut_cognome";
        $statement = $connessione->prepare($sql);

        //3 bind (specificata nella pagina dettaglio.php)
        $statement->bindParam(':nome',$nome);
        

        //4 esecuzione di una query
        $statement->execute();

        //5 restituzione dei dati
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
        echo "Errore di Connessione: " . $e->getMessage() . "<br>";
        $records =[];
    }


    echo "<br>";
    echo "<table>";
    echo "<tr> 
            <th>Cognome</th>
            <th>Nome</th>
        </tr>";
    foreach($records as $record)
        {
            echo "<tr> 
            <td>{$record['ut_cognome']}</td>
            <td>{$record['ut_nome']}</td>";
            
            if(empty($record['ut_dimesso']))
            echo "<td><a href='modifica.php?id=$record[utenteID]'><img src='images/dimissioni.png' width=15 title='Dimissioni in data odierna'></a></td>
            </tr>";
        }
    echo "</table>";
     echo "<hr>";
    echo "Di chi è il compleanno tra un mese?<br>";
try
    {
        //1 connessione
        $connessione = new PDO($dsn,$user,$pass);

        //2 preparazione dello statement (query sql)
        $sql = "SELECT * FROM utenti 
                WHERE MONTH(ut_data) = MONTH(DATE_ADD(CURDATE(), INTERVAL 1 MONTH))
                AND DAY(ut_data) = DAY(DATE_ADD(CURDATE(), INTERVAL 1 MONTH))";
        $statement = $connessione->prepare($sql);

        //3 bind (specificata nella pagina dettaglio.php)

        //4 esecuzione di una query
        $statement->execute();

        //5 restituzione dei dati
        $compleanni = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
        echo "Errore di Connessione: " . $e->getMessage() . "<br>";
        $compleanni =[];
    }
    
    //print_r($compleanni);
     if($compleanni)
        {
            foreach($compleanni as $compleanno)
                {
                    echo "{$compleanno['ut_nome']}
                          {$compleanno['ut_cognome']} ";
                    echo (new DateTime($compleanno['ut_data']))->format('d-m-Y').", ";
                }
        }
?>
</body>
</html>