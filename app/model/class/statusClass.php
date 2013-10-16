<?php if(!defined('BASEPATH')) exit(header('Location: ./../../../index.php'));

class statusClass{
    /*
    * Atributos
    */
    private $idstatus;
    private $status;

    /*
    * Propriedades dos atributos
    */

    public function setIdstatus($idstatus){
        $this->idstatus = $idstatus;
    }

    public function getIdstatus(){
        return $this->idstatus;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }
}

?>
