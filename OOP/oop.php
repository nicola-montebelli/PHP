<?php 
//definizione della classe
    class Esempio
    {
        //proprietà = variabile
        public $saluto = "Buonasera";
        public $nome;
        static public $testo ="proprietà statica";   //tutte le istanze usano la stessa proprietà STATICA

        //PER CASA creare un contatore di oggetti istanziati,cioè una proprietà statica incrementata ad ogni chiamata del costruttore

        function __construct($v) //è il metodo che viene chiamato quando viene istanziato un oggetto
        {
            $this->nome = $v;
            echo "Sono nel costuttore dell'oggetto Esempio con v = $v ";    
        }

        //di default la visibilità di un metodo è public
        function scriviCiao($saluto = null)   
        {
            if(!isset($saluto))
                {
                    
                    $this->saluto = $this->giornoSera();    //giornoSera essendo statica si può richiamara con ::
                }
            else
                {
                    $this->saluto = $saluto;
                }

            echo "$this->saluto, sono un metodo della classe Esempio<br>";    //$saluto deve essere deciso da chi richiama il metodo
        }

        static private function giornoSera()
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
        $e = new Esempio("oggetto e");                                             //istanza di un oggetto
        $e ->saluto = "Pippo";      //referenza della proprietà della classe. Possiamo anche cambiarle il valore                                    
        echo "Valore di saluto (proprietà) dell'istanza \$e: ". $e->saluto;
        echo "<br>";
        $f = new Esempio("oggetto f");
        echo "Valore di saluto (proprietà) dell'istanza \$f: ". $f->saluto;
        echo "<hr>";

        $e -> scriviCiao("AO"); //$e->saluto Pippo           //referenza (->) del metodo in una classe.  L'oggetto istanziato può solo richiamare metodi e proprietà pubbliche
        $f -> scriviCiao(); //$f->saluto Buonasera

        //echo $e non si può fare
        //var_dump($e);
        echo "<hr>";

        //referenziare un elemento statico
        echo Esempio::$testo;
        //o anche un oggetto qualsiasi ($e::$testo)
        echo "<br>";
        //se cambiassimo il valore di $testo?
        echo $f::$testo="Nuovo testo statico";
    ?>
</body>
</html>