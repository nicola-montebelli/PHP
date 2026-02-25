<?php 
include_once("config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica del 20.02.26 - FORM e query string</title>
</head>
<body>
<form action="" method="GET">
Inserisci una data di nascita:
<input type="date" name="datanascita"><br>      <!--1-->
Inserisci un ruolo:
<input type="text" name="ruolo" placeholder="utente - admin">
<input type="submit" value="Cerca">
</form>

<?php
if($_GET)
    {
        try
            {
                //1 connessione
                $connessione = new PDO($dsn,$user,$pass);
        
                //2 preparazione dello statement (query sql)
                $data_inserita = $_REQUEST['datanascita'];
                $ruolo_inserito = $_REQUEST['ruolo'];      
                $sql = "SELECT ute_id, ute_nome, ute_cognome, ute_ruolo, ute_natoil
                        FROM utenti
                        WHERE ute_natoil > :datanascita";
                $statement = $connessione->prepare($sql);
        
                //3 bind (specificata nella pagina dettaglio.php)
                $statement->bindParam(':datanascita',$data_inserita);
            
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
            if(!$data_inserita )
                {
                    echo "Non è stata inserita una data";
                }
                else
                {
                    echo "<b>Utenti trovati che sono nati dopo il ".(new DateTime($data_inserita))->format('d-m-Y')."</b><br>";
                    if(! $records)
                        {
                            echo "Non son stati trovati utenti";
                        }
                    else 
                        {
                            foreach($records as $record)
                                {
                                    echo "'$record[ute_nome] ";
                                    echo "$record[ute_cognome]' ";          //2
                                    echo "'$record[ute_ruolo]' ";
                                    if($record['ute_ruolo'] != $ruolo_inserito)
                                        {
                                            echo "<a href='modifica_ruolo.php?id=$record[ute_id]&ruolo=$ruolo_inserito'> Cambia Ruolo</a> ";
                                        }
                                    echo (new DateTime($record['ute_natoil']))->format('d-m-Y')." ";
                                    if(compleanno($record['ute_natoil']))
                                        {
                                            echo "Auguri!!!";
                                        }else echo "Non è ancora il tuo compleanno";
                                    echo "<br>";
                                }
                        }
                }
    }
?>

<?php 
function compleanno($data)       //3
{
    $data_compleanno = substr($data,5);
    if($data_compleanno== date("m-d"))
        {
            return true;
        }
    return false;
}

?>
</body>
</html>