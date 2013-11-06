<?php if(!defined('BASEPATH')) exit(header('Location: ./../../index.php'));

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of requisicaoControl
 *
 * @author italo
 */

require_once(BASEMODEL.'conexaoBD.php');
require_once(BASEMODELDAO.'requisicaoDAO.php');
require_once(BASEMODELDAO.'requisicao_has_materialDAO.php');
require_once(BASEMODELCLASS.'usuarioClass.php');


//session_start();

class requisicao {
    //put your code here
    public function cadastrar(){
      
       if(isset($_SESSION['session']['acoes']['nomeR'])&&
         isset($_SESSION['session']['acoes']['grupoR'])&&
         isset($_SESSION['session']['acoes']['qntR'])){
           
         $nome    =  $_SESSION['session']['acoes']['nomeR'];
         $grupo   =  $_SESSION['session']['acoes']['grupoR'];
         $qnt     =  $_SESSION['session']['acoes']['qntR'];
         $usu = new usuarioClass();
         $usu = unserialize($_SESSION['session']['usuario']);
         //print_r($nome);
        
    
         
         
         $requis = new requisicaoDAO();
        
         
         
         $requiClass = new requisicaoClass();
         $requiClass->setMomento(date("d/m/y H:i"));
         $requiClass->setUsuario_idusuario($usu->getIdusuario());
         $requiClass->setStatus_idstatus(4);//Aguardando Atendimento
         
         
         $requicao_has_material = new requisicao_has_materialClass();
         $requicao_has_material->setQtdrequisitada($qnt);
         
         
         
         print_r($requiClass);
         //print_r($usu);

        //$requis->incluir($dados);
        }
    }
}


