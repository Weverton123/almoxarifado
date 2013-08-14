<?php

class requisicaoClass{
    /*
    * Atributos
    */
    private $idrequisicao;
    private $momento;
    private $usuario_idusuario;
    private $status_idstatus;

    /*
    * Propriedades dos atributos
    */

    public function setIdrequisicao($idrequisicao){
        $this->idrequisicao = $idrequisicao;
    }

    public function getIdrequisicao(){
        return $this->idrequisicao;
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

    public function setStatus_idstatus($status_idstatus){
        $this->status_idstatus = $status_idstatus;
    }

    public function getStatus_idstatus(){
        return $this->status_idstatus;
    }
}

?>
