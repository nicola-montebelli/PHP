<?php 
session_start();
include_once("utilità.php");
//se l'utente è già autenticato, redirect a elenco.php
if(isset($_SESSION['autorizzato']) && $_SESSION['autorizzato'])
    {
        header("Location: elenco.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    Inserisci Nome utente e password per accedere
<form action="" method="POST"> 
    <input type="text" name="mail" placeholder="mail"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="submit" value="Accedi">
</form>

<?php 
if($_POST)
{
    //verifica login con i dati passati traimite POST
    if(Utilita::verificaLogin($_POST['mail'],$_POST['password']))  //questo metodo restituisce true se l'utente esiste | false se non esiste
    {
        header("Location: elenco.php");
    }
    else
    {
        echo "Utente o password non corretti. Riprovare<br>";
    }
}
?>
</body>
</html>