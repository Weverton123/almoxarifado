<?php

class tipousuarioClass{
    /*
    * Atributos
    */
    private $idtipousuario;
    private $tipo;

    /*
    * Propriedades dos atributos
    */

    public function setIdtipousuario($idtipousuario){
        $this->idtipousuario = $idtipousuario;
    }

    public function getIdtipousuario(){
        return $this->idtipousuario;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getTipo(){
        return $this->tipo;
    }
}

?>
