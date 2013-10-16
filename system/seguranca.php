<?php if(!defined('BASEPATH')) exit(header('Location: ./../index.php'));
/**
 * Description of seguranca
 *
 * @author italo
 */
require_once (BASEMODELCLASS.'menuClass.php');

 session_start();
     function seguranca_arq(){
    
        if(isset($_SESSION['session']['logado'])){//verifica se usuario está logado e para verificar se ele tem acesso a página
          $menuDisp = unserialize($_SESSION['session']['logado']);
          $menu = new menuClass();
          $menu = $menuDisp;
         //print_r($menu);
          
          $acesso = FALSE;
          foreach ($menuDisp as $lsp){

              if($lsp->getLink()== $_REQUEST['action']){//verifica se o usuario logado tem acesso a pagina requisitada
                  $acesso=TRUE;
                  break;
                }
               // echo $lsp->getLink().' ';
          }

          if(!$acesso){//se o acesso for FALSE
            if($_REQUEST['action']=='minhaarea')
             redirecionar('?action=index');
            else redirecionar('?action=minhaarea');
              
          }
         
              
        }
        else{
            //echo 'nao logado';
            redirecionar();
        }
        
        
    }

   function verifica_acesso(){
      
       
         $menuDisp = unserialize($_SESSION['session']['logado']);
         
          $menu = new menuClass();
          $menu = $menuDisp;
         //print_r($menu);
         
          $acesso = FALSE;
          foreach ($menuDisp as $lsp){

              if($lsp->getLink()== $_REQUEST['action']){//verifica se o usuario logado tem acesso a pagina requisitada
                  $acesso=TRUE;
                  break;
                }
               // echo $lsp->getLink().' ';
           }
            
         return $acesso;
       
       
   }
    
    function redirecionar($retorno=null,$local=null){
          header('location:  '.$retorno);
           //header('location:  '.($local!=null?$local:'index').'.php'.$retorno);
	}

     function erro_campo_vazio(){
     $_SESSION['session']['acoes']['msg'] = 'Todos os campos devem ser preenchidos!';
     redirecionar("?action={$_REQUEST['action']}");
 }     
