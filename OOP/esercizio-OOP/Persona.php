<?php 
class Persona
{
    //proprietà della classe Persona
    private $nome;
    private $cognome;
    private $ruolo;
    private $voti;

    //metodi della classe Persona
    function __construct($nome,$cognome,$ruolo = "")
    {
        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setRuolo($ruolo);
         if($this->ruolo == "studente")
            {
                $voti = [9,6,5,10];
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