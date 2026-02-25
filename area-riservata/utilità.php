<?php 
include_once("inc/connessione.php"); 
//mettiamo a disposizione l'oggetto $conn
class Utilita
{
    //verifica delle credenziali
    static function verificaLogin($mail,$password) 
    {
        global $conn;  //permette di usare nella funzione la variabile presente nel global 
        try
        {
            $sql = "SELECT * 
            FROM utenti 
            WHERE ute_mail = :mail AND ute_password = :password";
            $st = $conn -> prepare($sql);

            $st -> bindParam(":mail",$mail);
            $st -> bindParam(":password",$password);

            $st -> execute();
            $utente = $st -> fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e)
        {
            echo "Errore di esecuzione query".$e->getMessage();
        }

        if($utente)
        {
            $_SESSION['autorizzato'] = true;
            return true;
        }
        else return false;
    }

    static function autenticato()
    {
        if(!isset($_SESSION['autorizzato']) || !$_SESSION['autorizzato'])
        {
            header("Location: index.php");
        } else return true;
    }
}

?>