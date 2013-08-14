<?php

class setorClass{
    /*
    * Atributos
    */
    private $idsetor;
    private $nome;

    /*
    * Propriedades dos atributos
    */

    public function setIdsetor($idsetor){
        $this->idsetor = $idsetor;
    }

    public function getIdsetor(){
        return $this->idsetor;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
}

?>
