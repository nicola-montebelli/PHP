<?php
include_once("Persona.php");
include_once("Corso.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio OOP classroom 11.02.26</title>
</head>
<body>
<?php 

    $studente1 = new Persona("mario","Rossi");
    $studente2 = new Persona("giovanni","Verdi");
    $docente1 = new Persona("Claudia","Chiusoli","docente");

    echo $studente1->elencoDati();
    echo $docente1->elencoDati();
echo "<br>";
    $php = new Corso("PHP",date("Y"));
    $php ->docente = $docente1;     //assegniamo docente di classe Persona al parametro docente della classe Corso
    $php ->studenti=[$studente1,$studente2];
    echo $php->stampaDati();
    
    //confrontare questo file con quello della prof su classroom
    //trovare il perchè il debug non funziona 
    //dubbi sull'echo titolo corso e anno
?>
</body>
</html>