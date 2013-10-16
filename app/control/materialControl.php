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
  //require_once (BASEMODEL.'conexaoBD.php');
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
        //print_r($mat);  
        $material = new materialDAO();
        $categoria = new categoriaDAO();
        $ret = $material->ObterPorNome($mat->getNome());
        $nomeCateg = $categoria->ObterPorPK($mat->getCategoria_idcategoria());
         
        if($ret){
     
        if($ret->getCategoria_idcategoria() == $nomeCateg->getNome()){
            echo 'material ja cadastrado';
            $_SESSION['session']['acoes']['msg'] = 'Material já cadastrado!';
            redirecionar('?action=cadastrarmaterial');
        }
        else{
            if($material->incluir($mat) < 0){
                $_SESSION['session']['acoes']['msg'] = 'Falha ao cadastrar material!';  
               }
               else {
                 $_SESSION['session']['acoes']['msg'] = 'Material cadastrado com sucesso!';
               }
                     redirecionar('?action=material');   
        }
            
        }
        else {
               if($material->incluir($mat) < 0){
                $_SESSION['session']['acoes']['msg'] = 'Falha ao cadastrar material!';  
               }
               else {
                 $_SESSION['session']['acoes']['msg'] = 'Material cadastrado com sucesso!';
               }
            redirecionar('?action=material');     
          // echo 'material nao cadastrado';
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
   
    public function alterarnome(){
       
        if(!isset($_SESSION['session']['acoes']['idmaterial'])){          
            redirecionar('?action=setor');
        }
       
         $mat = $_SESSION['session']['acoes'];

         
         
         $material = new materialDAO();
         $result = $material->ObterPorNome($mat['newname']);
         
         if(!$result || $result->getCategoria_idcategoria() != $mat['grupoatual'] ){
          //echo 'nao encontrado';   
         $ret = $material->AlterarNome($mat['newname'],$mat['idmaterial']);

         if($ret > 0){
            $_SESSION['session']['acoes']['msg']='Material alterado com sucesso!';
         }
         else{
            $_SESSION['session']['acoes']['msg']='Falha ao tentar alterar Material!';  
         }        
        redirecionar('?action=material'); 
       }
       else{
            
            print_r($result);
            $_SESSION['session']['acoes']['msg']='Falha: Nome de material já cadastrado no grupo '.$result->getCategoria_idcategoria(); 
            redirecionar('?action=editarmaterial');
       }
    }
    
    public function alterarquantidade(){
       
        if(!isset($_SESSION['session']['acoes']['idmaterial'])){          
            redirecionar('?action=setor');
        }
       
         $mat = $_SESSION['session']['acoes'];

         $material = new materialDAO();
         $ret = $material->AlterarQuantidade($mat['newquantidade'],$mat['idmaterial']);

         if($ret > 0){
            $_SESSION['session']['acoes']['msg']='Material alterado com sucesso!';
         }
         else{
            $_SESSION['session']['acoes']['msg']='Falha ao tentar alterar Material!';  
         }        
        redirecionar('?action=material'); 
    }
    public function alterardetalhes(){
       
        if(!isset($_SESSION['session']['acoes']['idmaterial'])){          
            redirecionar('?action=setor');
        }
       
         $mat = $_SESSION['session']['acoes'];

         $material = new materialDAO();
         $ret = $material->AlterarDetalhe($mat['newdetalhes'],$mat['idmaterial']);

         if($ret > 0){
            $_SESSION['session']['acoes']['msg']='Material alterado com sucesso!';
         }
         else{
            $_SESSION['session']['acoes']['msg']='Falha ao tentar alterar Material!';  
         }        
        redirecionar('?action=material'); 
    }
    public function alterargrupo(){
       
        if(!isset($_SESSION['session']['acoes']['idmaterial'])){          
            redirecionar('?action=setor');
        }
       
         $mat = $_SESSION['session']['acoes'];

         $material = new materialDAO();
         $ret = $material->AlterarGrupo($mat['newgrupo'],$mat['idmaterial']);

         if($ret > 0){
            $_SESSION['session']['acoes']['msg']='Material alterado com sucesso!';
         }
         else{
            $_SESSION['session']['acoes']['msg']='Falha ao tentar alterar Material!';  
         }        
        redirecionar('?action=material'); 
    }
}

