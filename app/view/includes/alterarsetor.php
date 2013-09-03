<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
//seguranca_arq();  
ob_start();

session_start();

if(!isset($_SESSION['session']['acoes']['idusuario'])){
      redirecionar('?action=cliente');
}

 if(isset($_REQUEST['alterarN'])){//validação de formulário para alterar nome do setor
          
              $control = 'setor';//controle no qual tem os metodos para setor
              $action = '';//ação
              
              $_vals = array( 'newtipo' => $_REQUEST['tipo'],
                              'idusu' => $_SESSION['session']['acoes']['idusuario']  
                  );
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
      
    } 
 if(isset($_REQUEST['alterarC'])){//validação de formulário para alterar controle
          
              $control = 'setor';//controle no qual tem os metodos para setor
              $action = '';//ação
              
              $_vals = array( 'newtipo' => $_REQUEST['tipo'],
                              'idusu' => $_SESSION['session']['acoes']['idusuario']  
                  );
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
      
    } 

?>
