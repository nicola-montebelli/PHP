<?php 
//definizione della classe
    class Esempio
    {
        //proprietà = variabile
        public $saluto = "Buonasera";

        //di default la visibilità di un metodo è public
        function scriviCiao($saluto = null)   
        {
            if(!isset($saluto))
                {
                    
                    $this->saluto = $this->giornoSera();
                }
            else
                {
                    $this->saluto = $saluto;
                }

            echo "$this->saluto, sono un metodo della classe Esempio<br>";    //$saluto deve essere deciso da chi richiama il metodo
        }

        private function giornoSera()
        {
            $saluto = date("H")<17?"Buongiorno":"Buonasera"; 
            return $saluto;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP - Slide su classroom</title>
</head>
<body>
    <?php 
        $e = new Esempio;                                             //istanza di un oggetto
        $e ->saluto = "Pippo";      //referenza della proprietà della classe. Possiamo anche cambiarle il valore                                    
        echo "valore di saluto (proprietà) dell'istanza \$e: ". $e->saluto;
        echo "<br>";
        $f = new Esempio;
        echo "valore di saluto (proprietà) dell'istanza \$f: ". $f->saluto;
        echo "<hr>";

        $e -> scriviCiao("AO"); //$e->saluto Pippo           //referenza (->) del metodo in una classe.  L'oggetto istanziato può solo richiamare metodi e proprietà pubbliche
        $f -> scriviCiao(); //$f->saluto Buonasera

        //echo $e non si può fare
        //var_dump($e);
    ?>
</body>
</html>