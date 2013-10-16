<?php if(!defined('BASEPATH')) exit(header('Location: ./../../../index.php'));

class setorClass{
    /*
    * Atributos
    */
    private $idsetor;
    private $nome;
    private $codigo;
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
    
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCodigo(){
        return $this->codigo;
    }
}

?>
