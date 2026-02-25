<?php 
setcookie('miocookie',1,time()+60);  //Expire  default : session   time()+60  1 minuto dalla creazione
setcookie('secondocookie',2,time()+3600); //un'ora
setcookie('lingua','it',time()+(3600*24));

setcookie('nuovocookie','new');     //cosa succede se setto un nuovo cookie dopo che $_COOKIE ha già dei cookie settati?
//(LATO SERVER)la prima volta che viene eseguita verrà inserita nell'elenco dei cookie ma printr($_COOKIE) ritornerà array vuoto(o i valori dei cookie già esistenti)
//quando la richiesta torna al CLIENT $_COOKIE conterrà i valori di tutti i cookie
print_r($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>

</body>
</html>