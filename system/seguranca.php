<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
/**
 * Description of seguranca
 *
 * @author italo
 */

session_start();


     function seguranca_arq(){
	
        if(isset($_SESSION['session']['logado'])){
          #faltando colocar a segurança para caso o usuario nao tenha acesso!
          
        }
        else{
            //echo 'nao logado';
            redirecionar();
        }
        
        
    }

    function redirecionar($retorno=null,$local=null){
           header('location:  '.($local!=null?$local:'index').'.php'.$retorno);
	}


