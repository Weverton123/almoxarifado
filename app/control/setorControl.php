<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setorControl
 *
 * @author italo
 */

require_once (BASEMODEL.'conexaoBD.php');//realiza a conexao com o banco
require_once (BASEMODELDAO.'setorDAO.php');
session_start();
class setor {    
//put your code here
    

    public function inserir(){
      $action  = 'cliente';   
     if($_SESSION['session']['acoes']['setor']){
      $vars =  $_SESSION['session']['acoes']['setor'];
     
      $setorMod = new setorClass();
      $setorMod->setNome($vars);      
      $setor = new setorDAO();
      $ret = $setor->ObterPorPK($vars);
      //echo $ret->getNome();
      if(!$ret){
          echo 'setor pode ser cadastrado';
           $ret = $setor->incluir($setorMod);

            if(!$ret){
                 $_SESSION['session']['acoes']['msg'] = 'Falha ao tentar cadastrar sessão!';
            }
            else {
                $_SESSION['session']['acoes']['msg'] = 'Setor cadastrado com sucesso!';
            }
         
          header("Location: ?action={$action}");  
      }
       else {
          
         
           
          $_SESSION['session']['acoes']['msg'] = 'Setor ja existe';
          
          header("Location: ?action={$action}");
      }
        //
      }
        else{
            echo 'FALHA NA CRIAÇÃO DA SESSÃO!'; exit('CONTATE O ADMINISTRADOR!');
        }
       //header('Location: ?action=cliente');  
    }
    
}


