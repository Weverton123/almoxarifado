<?php if(!defined('BASEPATH')) exit(header('Location: ./../../index.php'));

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
        if(isset($_SESSION['session']['acoes']['setorname'])&&
         isset($_SESSION['session']['acoes']['setorcod']) ){
        
          $nome = $_SESSION['session']['acoes']['setorname'];
         $codigo = $_SESSION['session']['acoes']['setorcod'];
          
      $setor = new setorDAO();
      $ret = $setor->ObterPorPK($nome, $codigo);
      //print_r($ret);
      if(!$ret){
          //echo 'setor pode ser cadastrado';
           $ret2 = $setor->incluir($nome,$codigo);

            if(!$ret2 > 0){
                 $_SESSION['session']['acoes']['msg'] = 'Falha ao tentar cadastrar setor!';
                 redirecionar('?action=cadastrarsetor');

            }
            else {
                $_SESSION['session']['acoes']['msg'] = 'Setor cadastrado com sucesso!';
                redirecionar('?action=setor');

            }          
      }
       else {
                     
          $_SESSION['session']['acoes']['msg'] = 'Setor ou Código ja cadastrado!';
          redirecionar('?action=cadastrarsetor');
      }
        //
      }
        
    }
    
    public function alterarnome(){
        echo 'chegou';
        $tipo = new setorDAO();  
             $idsetor   = $_SESSION['session']['acoes']['idsetor'];
             $nome      = $_SESSION['session']['acoes']['newname'];  
        if(!$tipo->ObterPorPK($idsetor)){    
        $ret = $tipo->alterarnome($idsetor, $nome);
     
        if($ret > 0){
              $_SESSION['session']['acoes']['msg']='Alteração realizada com sucesso!';
            }
        else{
              $_SESSION['session']['acoes']['msg']='Falha na alteração!';  
            }
     redirecionar('?action=setor');
        }
        else{
              $_SESSION['session']['acoes']['msg']='Falha: nome ja cadastrado!';  
              redirecionar('?action=editarsetor');
        }
    }
    
    public function alterarcodigo(){
     $tipo = new setorDAO();  
             $idsetor   = $_SESSION['session']['acoes']['idsetor'];
             $cod       = $_SESSION['session']['acoes']['newcod'];  
        $ret = $tipo->alterarcodigo($idsetor, $cod);
     
        if($ret > 0){
              $_SESSION['session']['acoes']['msg']='Alteração realizada com sucesso!';
            }
        else{
              $_SESSION['session']['acoes']['msg']='Falha na alteração!';  
            }
     redirecionar('?action=setor');   
    }

        public function deletarsetor(){
         //   echo 'chegou';
        //session_start();
       
        if(!isset($_SESSION['session']['acoes']['idsetor'])){
            
            redirecionar('?action=setor');
        }
        if(verifica_acesso()){
        
         $set = $_SESSION['session']['acoes']['idsetor'];

         $setor = new setorDAO();
         $ret =  $setor->Deletar($set);//

         if($ret > 0){
            $_SESSION['session']['acoes']['msg']='Setor excluído com sucesso!';
         }
         else{
            $_SESSION['session']['acoes']['msg']='Falha ao tentar excluir setor!';  
         }
        }
        else{
           $_SESSION['session']['acoes']['msg']='Usuário sem permissão para realizar exclusão!';
        }
        redirecionar('?action=setor');
    }
    
}


