<?php

class aquisicao_has_materialClass{
    /*
    * Atributos
    */
    private $aquisicao_idaquisicao;
    private $material_idmaterial;
    private $quantidade;

    /*
    * Propriedades dos atributos
    */

    public function setAquisicao_idaquisicao($aquisicao_idaquisicao){
        $this->aquisicao_idaquisicao = $aquisicao_idaquisicao;
    }

    public function getAquisicao_idaquisicao(){
        return $this->aquisicao_idaquisicao;
    }

    public function setMaterial_idmaterial($material_idmaterial){
        $this->material_idmaterial = $material_idmaterial;
    }

    public function getMaterial_idmaterial(){
        return $this->material_idmaterial;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }
}

?>
