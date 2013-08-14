<?php


class categoriaClass{
    /*
    * Atributos
    */
    private $idcategoria;
    private $nome;

    /*
    * Propriedades dos atributos
    */

    public function setIdcategoria($idcategoria){
        $this->idcategoria = $idcategoria;
    }

    public function getIdcategoria(){
        return $this->idcategoria;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
}

?>
