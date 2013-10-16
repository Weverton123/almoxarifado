<?php if(!defined('BASEPATH')) exit(header('Location: ./../../../index.php'));

class requisicao_has_materialClass{
    /*
    * Atributos
    */
    private $requisicao_idrequisicao;
    private $material_idmaterial;
    private $qtdrequisitada;
    private $qtdentregue;
    private $status_idstatus;

    /*
    * Propriedades dos atributos
    */

    public function setRequisicao_idrequisicao($requisicao_idrequisicao){
        $this->requisicao_idrequisicao = $requisicao_idrequisicao;
    }

    public function getRequisicao_idrequisicao(){
        return $this->requisicao_idrequisicao;
    }

    public function setMaterial_idmaterial($material_idmaterial){
        $this->material_idmaterial = $material_idmaterial;
    }

    public function getMaterial_idmaterial(){
        return $this->material_idmaterial;
    }

    public function setQtdrequisitada($qtdrequisitada){
        $this->qtdrequisitada = $qtdrequisitada;
    }

    public function getQtdrequisitada(){
        return $this->qtdrequisitada;
    }

    public function setQtdentregue($qtdentregue){
        $this->qtdentregue = $qtdentregue;
    }

    public function getQtdentregue(){
        return $this->qtdentregue;
    }

    public function setStatus_idstatus($status_idstatus){
        $this->status_idstatus = $status_idstatus;
    }

    public function getStatus_idstatus(){
        return $this->status_idstatus;
    }
}

?>
