<?php if(!defined('BASEPATH')) exit(header('Location: ./../../index.php'));

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materialControl
 *
 * @author italo
 */
  require_once (BASEMODELDAO.'materialDAO.php');
  require_once (BASEMODELDAO.'categoriaDAO.php');
class material {
    //put your code here
      public function cadastrar(){
        $mat = new materialClass();
        $mat->setNome($_SESSION['session']['acoes']['materialname']);
        $mat->setQuantidadeatual($_SESSION['session']['acoes']['materialqnt']);
        $mat->setCategoria_idcategoria($_SESSION['session']['acoes']['materialgrupo']);
        $mat->setDetalhes($_SESSION['session']['acoes']['materialdetalhes']);
        
        $material = new materialDAO();
        $ret = $material->ObterPorPK($mat->getNome(), $mat->getCategoria_idcategoria());
        if($ret){
            $_SESSION['session']['acoes']['msg'] = 'Material já cadastrado!';
            redirecionar('?action=cadastrarmaterial');
        }
        else {
           try{ 
                $material->incluir($mat); 
                $_SESSION['session']['acoes']['msg'] = 'Material cadastrado com sucesso!';
           }
           catch (PDOException $ex){
             $_SESSION['session']['acoes']['msg'] = 'Falha ao cadastrar material!';  
           }
           redirecionar('?action=material'); 
        }       
     }
     
     public function deletarmaterial(){
         //   echo 'chegou';
        //session_start();
       
        if(!isset($_SESSION['session']['acoes']['idmaterial'])){
            
            redirecionar('?action=setor');
        }
        if(verifica_acesso()){
        
         $set = $_SESSION['session']['acoes']['idmaterial'];

         $setor = new materialDAO();
         $ret =  $setor->Deletar($set);//

         if($ret > 0){
            $_SESSION['session']['acoes']['msg']='Material excluído com sucesso!';
         }
         else{
            $_SESSION['session']['acoes']['msg']='Falha ao tentar excluir Material!';  
         }
        }
        else{
           $_SESSION['session']['acoes']['msg']='Usuário sem permissão para realizar exclusão!';
        }
        redirecionar('?action=material');
    }
   
    
}

