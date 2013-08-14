<?php

class aquisicaoClass{
    /*
    * Atributos
    */
    private $idaquisicao;
    private $momento;
    private $usuario_idusuario;

    /*
    * Propriedades dos atributos
    */

    public function setIdaquisicao($idaquisicao){
        $this->idaquisicao = $idaquisicao;
    }

    public function getIdaquisicao(){
        return $this->idaquisicao;
    }

    public function setMomento($momento){
        $this->momento = $momento;
    }

    public function getMomento(){
        return $this->momento;
    }

    public function setUsuario_idusuario($usuario_idusuario){
        $this->usuario_idusuario = $usuario_idusuario;
    }

    public function getUsuario_idusuario(){
        return $this->usuario_idusuario;
    }
}

?>
