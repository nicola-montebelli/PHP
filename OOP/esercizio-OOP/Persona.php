<?php 
class Persona
{
    //proprietà della classe Persona
    private $nome;
    private $cognome;
    private $ruolo;
    private $voti;

    //metodi della classe Persona
    function __construct($nome,$cognome,$ruolo = " ")
    {
        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setRuolo($ruolo);
         if($this->ruolo == "studente")
            {
                $this->voti = [rand(1,10),rand(1,10),rand(1,10),rand(1,10)];        //si poteva fare anche un for
            }
    }
    
//funzione per stampare i dati di uno studente/docente da richiamare in index.php
    function elencoDati()
    {
        echo $this->getNome()." ".$this->getCognome(). " Ruolo: ".$this->getRuolo()."<br>";
    }

//GET e SET della proprietà $nome
    function getNome()      
    {
        return $this->nome;
    }

    function setNome($nome)
    {
        $this->nome=ucfirst($nome); //ucfirst rende la prima lettera maiuscola
    }

//GET e SET della proprietà $cognome
    function getCognome()   
    {
        return $this->cognome;
    }
    function setCognome($cognome)
    { 
        $this->cognome =ucfirst($cognome);
    }
//GET per i voti dello studente
    function getVoti()
    {
        return $this->voti;
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