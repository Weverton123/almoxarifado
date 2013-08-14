<?php

class menuClass{
    /*
    * Atributos
    */
    private $idmenu;
    private $nome;
    private $link;

    /*
    * Propriedades dos atributos
    */

    public function setIdmenu($idmenu){
        $this->idmenu = $idmenu;
    }

    public function getIdmenu(){
        return $this->idmenu;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setLink($link){
        $this->link = $link;
    }

    public function getLink(){
        return $this->link;
    }
}

?>
