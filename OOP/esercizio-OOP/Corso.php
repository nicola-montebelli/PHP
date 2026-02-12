<?php 
include_once("Persona.php");
class Corso
{
    public $titolo;
    public $anno;
    public $docente;
    public $studenti;


    function __construct($titolo,$anno)
    {
        $this->titolo = $titolo;
        $this->anno = $anno;
    }

    function stampaDati()
    {
        echo $this->titolo." ".$this->anno."<br>";
        $d = $this->docente;
        echo "docente : ".$d -> getNome()."<br>";
        echo $this->nStudenti()." studenti:";
        foreach($this->studenti as $studente)
            {
                echo"<br>".$studente->getCognome();
            }
    }

    function nStudenti()
    {
        return count($this->studenti);
    }
    
    function media()
    {

    }
}

?>