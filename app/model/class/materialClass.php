<?php

class materialClass{
    /*
    * Atributos
    */
    private $idmaterial;
    private $nome;
    private $detalhes;
    private $quantidadeatual;
    private $categoria_idcategoria;

    /*
    * Propriedades dos atributos
    */

    public function setIdmaterial($idmaterial){
        $this->idmaterial = $idmaterial;
    }

    public function getIdmaterial(){
        return $this->idmaterial;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setDetalhes($detalhes){
        $this->detalhes = $detalhes;
    }

    public function getDetalhes(){
        return $this->detalhes;
    }

    public function setQuantidadeatual($quantidadeatual){
        $this->quantidadeatual = $quantidadeatual;
    }

    public function getQuantidadeatual(){
        return $this->quantidadeatual;
    }

    public function setCategoria_idcategoria($categoria_idcategoria){
        $this->categoria_idcategoria = $categoria_idcategoria;
    }

    public function getCategoria_idcategoria(){
        return $this->categoria_idcategoria;
    }
}

?>
