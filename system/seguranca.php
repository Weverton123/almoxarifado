<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
/**
 * Description of seguranca
 *
 * @author italo
 */

session_start();


     function seguranca_arq(){
	
        if(isset($_SESSION['session']['logado'])){//verifica se usuario está logado e para verificar se ele tem acesso a página
          $menuDisp = unserialize($_SESSION['session']['logado']);
          $menu = new menuClass();
          $menu = $menuDisp;
          /*$acesso = FALSE;
          foreach ($menu as $ls){
              if($ls->getLink()==$_REQUEST['action']){//verifica se o usuario logado tem acesso a pagina requisitada
                  $acesso=TRUE;
                }
              
          }
          if(!$acesso && $_REQUEST['action']=='minhaarea'){
              
              redirecionar('?action=index');
          }
          else if(!$acesso) {
              redirecionar('?action=minhaarea');
          }*/
              
        }
        else{
            //echo 'nao logado';
            redirecionar();
        }
        
        
    }

    function redirecionar($retorno=null,$local=null){
           header('location:  '.($local!=null?$local:'index').'.php'.$retorno);
	}


