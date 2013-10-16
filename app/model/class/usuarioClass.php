<?php if(!defined('BASEPATH')) exit(header('Location: ./../../../index.php'));

class usuarioClass{
    /*
    * Atributos
    */
    private $login;
    private $nome;
    private $matricula;
    private $senha;
    private $setor_idsetor;
    private $tipousuario_idtipousuario;
    private $idusuario;

    /*
    * Propriedades dos atributos
    */

    public function setLogin($login){
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSetor_idsetor($setor_idsetor){
        $this->setor_idsetor = $setor_idsetor;
    }

    public function getSetor_idsetor(){
        return $this->setor_idsetor;
    }

    public function setTipousuario_idtipousuario($tipousuario_idtipousuario){
        $this->tipousuario_idtipousuario = $tipousuario_idtipousuario;
    }

    public function getTipousuario_idtipousuario(){
        return $this->tipousuario_idtipousuario;
    }

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }

    public function getIdusuario(){
        return $this->idusuario;
    }
}

?>
