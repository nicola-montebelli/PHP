<?php  
include_once("config.php");

try 
{
    //1 connessione
    $conn = new PDO($dsn, $user, $password);
} 
catch (PDOException $e) 
{
    echo "Errore di connessione: " . $e->getMessage();
}
?>