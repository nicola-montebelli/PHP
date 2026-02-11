<?php 
class Persona
{
    private $nome;
    private $cognome;
    private $ruolo;
    private $voti;

    function __construct($nome,$cognome,$ruolo = "")
    {
        $this->setNome($nome); //fare la stessa cosa col cognome
        $this->cognome=$cognome;
         $this->setRuolo($ruolo);
         if($this->ruolo == "studente")
            {
                $voti = [9,6,5,10];
            }
    }

    function elencoDati()
    {
        echo $this->getNome()." ".$this->getCognome(). " Ruolo: ".$this->getRuolo()."<br>";
    }
    //ruolo
    function getNome()      //getter
    {
        return $this->nome;
    }

    function setNome($nome)
    {
        $this->nome=ucfirst($nome); //ucfirst rende la prima lettera maiuscola
    }
    function getCognome()   //getter
    {
        return $this->cognome;
    }

    //ruolo
    function setRuolo($ruolo)
    {
        if($ruolo != "docente") 
            $ruolo = "studente";
        $this->ruolo = $ruolo;
    }
    function getRuolo()
    {
        return $this->ruolo;
    }
}


?>